<!DOCTYPE html>
<html>
<head>
    <title>Subtitle Editor</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/wavesurfer.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/plugin/wavesurfer.regions.min.js"></script>
    <script src="/js/wavesurfer.timeline.min.js"></script>
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
            font-family: 'Helvetica Neue' !important;
            -webkit-font-smoothing: antialiased;
            background-color: #f7f7f7;
        }
        .playback-tracker .el-slider__button{
            width: 10px;
            height: 10px;
        }
        .playback-actions .el-slider__button {
            width: 8px;
            height: 8px;
        }
        .playback-actions .el-input__inner {
            padding: 0;
            padding-left: 10px;
            height: 28px !important;
            padding-right: 20px !important;
        }
        .playback-actions .el-input__suffix {
            top: 3px;
        }

        /*.el-slider__runway:hover .playback-tracker .el-slider__button {
            transform: scale(1.2);
        }*/
    </style>
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>