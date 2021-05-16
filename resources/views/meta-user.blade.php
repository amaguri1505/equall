<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <meta name="description" content="ペットの不動産・住宅に関する住宅検索サイトです。賃貸情報からマンション、一戸建て、リノベーションなど猫(ねこ)・犬(いぬ)と一緒に暮らせる物件を多数ご紹介します。家族でペット可物件探しをお楽しみください。">
    <title>
        equall(イコール)ペットと暮らせる「おうち」を探そう
    </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="app" class="common__container common__container--corp">
    <v-app>
        <apponlyheader />
    </v-app>
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
