import app from 'flarum/app';
import {extend} from 'flarum/extend';
import Button from 'flarum/components/Button'
import Dropdown from 'flarum/components/Dropdown'
import SignUpModal from 'flarum/components/SignUpModal';
import SettingsPage from 'flarum/components/SettingsPage';
import FieldSet from 'flarum/components/FieldSet';
import ItemList from 'flarum/utils/ItemList';

import User from 'flarum/models/User';
import Model from 'flarum/Model';

app.initializers.add('kyrne-sylloge', () => {
  User.prototype.digestEnabled = Model.attribute('digestEnabled');

  extend(SignUpModal.prototype, 'init', function () {

    this.getDigest = m.prop(false);
  });

  extend(SignUpModal.prototype, 'fields', function (items) {
    items.add('kyrne-sylloge', m('.Form-group', m('.sylloge-checkbox', m('label.checkbox', [
      m('input', {
        type: 'checkbox',
        bidi: this.getDigest,
        disabled: this.loading,
      }),
      app.translator.trans('kyrne-sylloge.forum.signup.want_digest'),
    ]))));
  });

  extend(SignUpModal.prototype, 'submitData', function (data) {
    data.digestEnabled = this.getDigest();
  });

  extend(SettingsPage.prototype, 'settingsItems', items => {

    const digestItems = () => {
        const items = new ItemList();

        const options = [
          app.translator.trans('kyrne-sylloge.forum.settings.none'),
          app.translator.trans('kyrne-sylloge.forum.settings.daily'),
          app.translator.trans('kyrne-sylloge.forum.settings.weekly')
        ];

        items.add(
          'Digest',
          Dropdown.component({
            buttonClassName: 'Button',
            label: options[app.session.user.digestEnabled()],
            children: options.map((value, i) => {
              const active = app.session.user.digestEnabled() === i;

              return Button.component({
                children: value,
                icon: active ? 'fas fa-check' : true,
                onclick: () => {
                  app.session.user.save({
                    digestEnabled: i
                  })
                },
                active,
              });
            }),
          }),
          -10
        );

        return items;
      };

    items.add(
      'digest',
      FieldSet.component({
        label: app.translator.trans('kyrne-sylloge.forum.settings.label'),
        className: 'Settings-account',
        children: digestItems().toArray(),
      }), 1
    )
  });
});
