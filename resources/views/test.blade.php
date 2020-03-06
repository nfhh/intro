<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>terra</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        main {
            display: flex;
            height: 100vh;
        }

        main .nav {
            width: 480px;
            background-color: #cdcdcd;
            padding-right: 80px;
            justify-content: space-between;
            display: flex;
            flex-direction: column;
        }

        main .article {
            background: #fff;
            flex: 1;
            display: flex;
            flex-direction: column;
            padding-left: 68px;
            padding-right: 68px;
        }

        .nav .one {
            align-self: flex-end;
            padding-top: 10px;
        }

        .nav .two {
            color: #fff;
            align-self: flex-end;
            font-size: 26px;
            text-align: right;
        }

        .nav .three {
            align-self: flex-end;
            padding-bottom: 60px;
        }

        .article .one {
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .article .one .left {
            width: 120px;
            display: flex;
            justify-content: space-between;
        }

        .article .two, .article .two .top {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .article .two {
            padding-top: 10px;
            height: 240px;
        }

        .article .two .top {
            height: 120px;
        }

        .article .two .top .inside1 h1 {
            font-size: 36px;
        }

        .article .two .top .inside2 select {
            width: 600px;
            font-size: 16px;
            background-color: #ffffff;
            border: 1px solid #E9E9E9;
            padding: 8px 16px;
        }

        .article .two .bottom button {
            background-color: #ffffff;
            border: 1px solid #E9E9E9;
            color: #333333;
            padding: 6px 20px;
            font-size: 16px;
        }

        .vd1, .vd2 {
            display: contents;
        }
    </style>
</head>

<body>
<main id="app">
    <div class="vd1">
        <div class="vd2">
            <nav class="nav">
                <div class="one">
                    <a href=""><img src="/images/home.png" alt="" width="40" height="40"></a>
                </div>
                <div class="two">
                    <p><strong>F4-210</strong></p>
                    <p><strong>Quick Installation Guide</strong></p>
                </div>
                <div class="three">
                    <img src="/images/logo.svg" alt="" width="120" height="90">
                </div>
            </nav>
            <article class="article">
                <div class="one">
                    <div class="left">
                    </div>
                    <div class="right">
                        <select name="" id="">
                            <option value="">中文</option>
                            <option value="">英文</option>
                        </select>
                    </div>
                </div>
                <div class="two">
                    <div class="top">
                        <div class="inside1">
                            <h1>Quick Installation Guide</h1>
                        </div>
                        <div class="inside2">
                            <select>
                                <option value="">请选择产品型号</option>
                                <option value="">英文</option>
                            </select>
                        </div>
                    </div>
                    <div class="bottom">
                        <button type="button">Start</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>
</body>
</html>
