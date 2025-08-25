<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('ui.reset_password_email_title') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0070ba;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
        }
        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 25px;
            background-color: #0070ba;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            background-color: #f4f4f7;
            color: #999999;
            font-size: 12px;
            padding: 20px;
            text-align: center;
        }
        .footer a {
            color: #0070ba;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="Logo Smart School">
            <h1>{{ __('ui.reset_password_email_header') }}</h1>
        </div>
        <div class="content">
            <p>{{ __('ui.hello_name', ['name' => $user->name]) }},</p>
            <p>{{ __('ui.reset_password_email_intro') }}</p>

            <p style="text-align:center;">
                <a href="{{ $url }}" class="button">{{ __('ui.reset_password_email_button') }}</a>
            </p>

            <p>{{ __('ui.reset_password_email_expire') }}</p>
            <p>{{ __('ui.reset_password_email_noaction') }}</p>
        </div>
        <div class="footer">
            <p>{{ __('ui.regards') }}<br>{{ __('ui.team_name') }}</p>
            <p>© {{ date('Y') }} {{ __('ui.team_name') }}. {{ __('ui.rights_reserved') }}</p>
        </div>
    </div>
</body>
</html>