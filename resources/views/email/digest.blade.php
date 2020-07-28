<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style media="all" type="text/css">
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        }
        .link {
            transition: background .2s;
        }
        .link:hover {
            border-radius: 4px;
            background: #EFF3F8;
        }
        @media only screen and (max-width: 620px) {
            table[class=body] h1,
            table[class=body] h2,
            table[class=body] h3,
            table[class=body] h4 {
                font-weight: 600 !important;
            }

            table[class=body] h1 {
                font-size: 22px !important;
            }

            table[class=body] h2 {
                font-size: 18px !important;
            }

            table[class=body] h3 {
                font-size: 16px !important;
            }

            table[class=body] .content,
            table[class=body] .wrapper {
                padding: 10px !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table[class=body] .btn {
                width: 100% !important;
            }

            table[class=body] img {
                height: auto !important;
                max-width: 100% !important;
            }
        }

        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            .content-header {
                background-image: linear-gradient(120deg, {{ $primaryColor }}, {{ $secondaryColor }}) !important;
            }
        }
    </style>
</head>

<body style="margin: 0; font-size: 14px; -webkit-text-size-adjust: 100%; line-height: 1.6em; -webkit-font-smoothing: antialiased; padding: 0; -ms-text-size-adjust: 100%; background-color: #f9f9f9; height: 100% !important; width: 100% !important;">
<table class="body" cellpadding="0" cellspacing="0" border="0" style="box-sizing: border-box; -premailer-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9; width: 100%; border-collapse: separate !important;"
       width="100%" bgcolor="#f9f9f9">
    <tr>
        <td style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
            valign="top"></td>
        <td class="container" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto !important;"
            width="580" valign="top">
            <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

                <table
                        class="main" cellpadding="0" cellspacing="0" border="0" style="box-sizing: border-box; -premailer-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background: #fff; border-radius: 3px; border-collapse: separate !important;"
                        width="100%">
                    <tr>
                        <td class="content-header h1" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #1271db; border-radius: 3px 3px 0 0; text-align: center; padding: 60px 0;"
                            valign="top" bgcolor="#1271db" align="center">
                            <h1 style=" font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 30px; font-size: 34px; padding: 0; text-align: center; color: #ffffff; text-transform: none;">{{ $forumTitle }}</h1>
                            <h4 style="color: #fff; display: inline-block; float: left; margin: 0; position: relative; top: 50px; text-align: left; left: 10px">{{ $date }}</h4>

                            <h4 style="color: #fff; display: inline-block; float: right; margin: 0; position: relative; top: 50px; text-align: right; right: 10px">{{ preg_replace("(^https?://)", "", $baseUrl) }}</h4>

                        </td>
                    </tr>
                    <tr>
                        <td class="wrapper" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 30px;"
                            valign="top">
                            <table style="box-sizing: border-box; -premailer-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-collapse: separate !important;"
                                   width="100%">
                                <tr>
                                    <td class="h2" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding: 30px 0;"
                                        valign="top">
                                        <h2 style="color: #1271db;  font-weight: 400; line-height: 1.4em; margin: 0; padding-bottom: 30px; font-size: 28px; padding: 0; text-align: center; text-transform: capitalize;">
                                            Recommended This Week</h2>

                                    </td>
                                </tr>
                                @if ($adminMessage !== '')

                                    <tr>
                                        <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                            valign="top" align="left">
                                            <p style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; padding-bottom: 15px;">
                                                <a href="{{ $baseUrl }}" style="box-sizing: border-box; color: #1271db; text-decoration: underline;">From
                                                    the Admins</a> &mdash; <i>{{ $adminMessage }}</i>
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                                <td style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                    valign="top">
                                    <table class="link-list" style="box-sizing: border-box; -premailer-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; padding-bottom: 30px; border-collapse: separate !important;"
                                           width="100%">
                                        <tr>
                                            <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                                valign="top" align="left">
                                                <img style="position: relative; top: 15px; border-radius:96px; vertical-align: middle; width: 35px;" src="{{ $content[0]['avatar'] }}"/>
                                                <h3 style="display:inline-block; color: #1271db;  font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 10px; font-size: 18px; text-transform: capitalize;">
                                                    <a href="{{ $content[0]['url'] }}" style="margin-left: 5px; box-sizing: border-box; color: #000; text-decoration: underline;">{{ $content[0]['title'] }}</a>
                                                </h3>
                                                &mdash;
                                                <span style="font-size: 14px; font-style:italic;"> {{ $content[0]['author'] }}</span>

                                                <p style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; margin-left: 45px; padding-bottom: 15px;">{!! $content[0]['content'] !!}</p>
                                            </td>
                                        </tr>
                                        @if (isset($content[1]))
                                            <tr>
                                                <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                                    valign="top" align="left">
                                                    <img style="position: relative; top: 15px; border-radius:96px; vertical-align: middle; width: 35px;" src="{{ $content[1]['avatar'] }}"/>
                                                    <h3 style="display:inline-block; color: #1271db;  font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 10px; font-size: 18px; text-transform: capitalize;">
                                                        <a href="{{ $content[1]['url'] }}" style="margin-left: 5px; box-sizing: border-box; color: #000; text-decoration: underline;">{{ $content[1]['title'] }}</a>
                                                    </h3>
                                                    &mdash;
                                                    <span style="font-size: 14px; font-style:italic;"> {{ $content[1]['author'] }}</span>

                                                    <p style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; margin-left: 45px; padding-bottom: 15px;">{!! $content[1]['content'] !!}</p>
                                                </td>
                                            <tr>
                                                @endif
                                                @if (isset($content[2]))
                                                    <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                                        valign="top" align="left">
                                                        <img style="position: relative; top: 15px; border-radius:96px; vertical-align: middle; width: 35px;" src="{{ $content[2]['avatar'] }}"/>
                                                        <h3 style="display:inline-block; color: #1271db;  font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 10px; font-size: 18px; text-transform: capitalize;">
                                                            <a href="{{ $content[2]['url'] }}" style="margin-left: 5px; box-sizing: border-box; color: #000; text-decoration: underline;">{{ $content[2]['title'] }}</a>
                                                        </h3>
                                                        &mdash;
                                                        <span style="font-size: 14px; font-style:italic;"> {{ $content[2]['author'] }}</span>

                                                        <p style="color: #333333; font-size: 14px; font-weight: normal; margin: 0; margin-left: 45px; padding-bottom: 15px;">{!! $content[2]['content'] !!}</p>
                                                    </td>
                                            </tr>
                                        @endif
                                        @if (isset($content[3]))
                                            <tr>
                                                <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                                    valign="top" align="left">
                                                    <img style="position: relative; top: 15px; border-radius:96px; vertical-align: middle; width: 35px;" src="{{ $content[3]['avatar'] }}"/>
                                                    <h3 style="display:inline-block; color: #1271db;  font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 10px; font-size: 18px; text-transform: capitalize;">
                                                        <a href="{{ $content[3]['url'] }}" style="margin-left: 5px; box-sizing: border-box; color: #000; text-decoration: underline;">{{ $content[3]['title'] }}</a>
                                                    </h3>
                                                    &mdash;
                                                    <span style="font-size: 14px; font-style:italic;"> {{ $content[3]['author'] }}</span>

                                                    <p style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; margin-left: 45px; padding-bottom: 15px;">{!! $content[3]['content'] !!}</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @if (isset($content[4]))
                                            <tr>
                                                <td class="link" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-bottom: 1px solid #eee; padding: 15px 0; position: relative; text-align: left;"
                                                    valign="top" align="left">
                                                    <img style="position: relative; top: 15px; border-radius:96px; vertical-align: middle; width: 35px;" src="{{ $content[4]['avatar'] }}"/>
                                                    <h3 style="display:inline-block; color: #1271db;  font-weight: bold; line-height: 1.4em; margin: 0; padding-bottom: 10px; font-size: 18px; text-transform: capitalize;">
                                                        <a href="{{ $content[4]['url'] }}" style="margin-left: 5px; box-sizing: border-box; color: #000; text-decoration: underline;">{{ $content[4]['title'] }}</a>
                                                    </h3>
                                                    &mdash;
                                                    <span style="font-size: 14px; font-style:italic;"> {{ $content[4]['author'] }}</span>

                                                    <p style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; margin-left: 45px; padding-bottom: 15px;">{!! $content[4]['content'] !!}</p>
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                    <table class="btn btn-primary btn-align-center" style="box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -premailer-width: auto; width: auto; margin-bottom: 15px; margin-left: auto; margin-right: auto; text-align: center; border-collapse: separate !important;"
                                           align="center">
                                        <tr>
                                            <td style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: {{ $primaryColor }}; border-radius: 4px; text-align: center;"
                                                valign="top" bgcolor="{{ $primaryColor }}" align="center">
                                                <a href="{{ $baseUrl }}" style="box-sizing: border-box; border-color: #1271db; text-decoration: none; background-color: {{ $primaryColor }}; border: solid 1px {{ $primaryColor }}; border-radius: 5px; cursor: pointer; color: #fff; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; display: inline-block;">Visit
                                                    the
                                                    <span class="lc" style="text-transform: none !important;">Forum</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <p class="align-center" style="color: #333333;  font-size: 14px; font-weight: normal; margin: 0; padding-bottom: 15px; text-align: center;">
                                        Thanks and have a successful week!</p>
                                </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer" style="box-sizing: border-box; clear: both; width: 100%;">
                    <table style="box-sizing: border-box; -premailer-width: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; color: #999; font-size: 12px; border-collapse: separate !important;"
                           width="100%">
                        <tr style="color: #999; font-size: 12px;">
                            <td class="align-center" style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #999; font-size: 12px; text-align: center; padding: 20px 0;"
                                valign="top" align="center">
                                <p style=" font-weight: normal; margin: 0; padding-bottom: 15px; color: #999; font-size: 12px;">
                                    Once upon a time you subscribed to this
                                    <a href="{{ $baseUrl }}"
                                       style="box-sizing: border-box; text-decoration: underline; color: #999; font-size: 12px;">digest</a>.
                                    Please<a href="{{ $unsubscribeURL }}"
                                       class="subtle" style="box-sizing: border-box; text-decoration: underline; color: inherit; font-size: 12px;">
                                        <unsubscribe style="color: #999; font-size: 12px;">unsubscribe</unsubscribe></a> if you'd prefer not to receive these weekly emails.
                                </p>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
        <td style="box-sizing: border-box; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
            valign="top"></td>
    </tr>
</table>
</body></body>