<!DOCTYPE html>
<html style="margin:0;padding:0;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了画面</title>
    <style>
        .box{
            position : relative ;
            display : flex ;
            flex-wrap : wrap ;
            perspective : 400px ;
            width : 600px ;
            height :300px ;
        }
        .box::before{
            content : '' ;
            position : absolute ;
            z-index : -1 ;
            bottom : 20px ;
            left : 0 ;
            right : 0 ;
            margin : 0 auto ;
            width : 160px ;
            height : 24px ;
            border-radius : 50% ;
            background : radial-gradient( rgba(0,0,0,.4) 10%, rgba(0,0,0,0) 50%) ;
            animation : shadow ease 3s infinite alternate ;
            opacity : .5 ;
        }
        .area{
            width : calc( 100% / 3 ) ;
            height : calc( 100% / 3 ) ; 
            box-sizing : border-box ;
        }
        .robot{
            position : absolute ;
            z-index : 2 ;
            top : 0 ;
            left : 0 ;
            right : 0 ;
            bottom : 0 ;
            margin : auto ;
            width : 240px ;
            height : 80px ;
            animation : float ease 3s infinite alternate ;
        }
        .front,
        .face{
            position : absolute ;
            z-index : 1 ;
            top : 0 ;
            left : 0 ;
            width : 240px ;
            height : 80px ;
            transform-origin : 50% 50% -40px ;
            transition : all ease .2s ;
            transform : rotateX(0) rotateY(0) ;
            perspective : 400px ;
        }
        .face{
            z-index : 2 ;
            background : #aaa ;
            background-color:hsla(0,4%,45%,1);
            background-image:
            radial-gradient(at 40% 20%, hsla(25,10%,31%,1) 0px, transparent 50%),
            radial-gradient(at 80% 0%, hsla(188,8%,39%,1) 0px, transparent 50%),
            radial-gradient(at 0% 50%, hsla(350,2%,45%,1) 0px, transparent 50%),
            radial-gradient(at 80% 50%, hsla(340,8%,20%,1) 0px, transparent 50%),
            radial-gradient(at 0% 100%, hsla(19,0%,0%,1) 0px, transparent 50%),
            radial-gradient(at 80% 100%, hsla(29,15%,16%,1) 0px, transparent 50%),
            radial-gradient(at 0% 0%, hsla(339,0%,60%,1) 0px, transparent 50%);
        }
        .face__wrapper{
            position : absolute ;
            top : 0 ;
            left : 0 ;
            right : 0 ;
            bottom : 0 ;
            margin : auto ;
            width : 220px ;
            height : 60px ;
            background : #333 ;
            box-shadow : 0 0 8px rgba(0,0,0,.6) inset ;
        }
        .eye{
            position : absolute ;
            z-index : 1 ;
            top : 0 ;
            left : 0 ;
            right : 0 ;
            bottom : 0 ;
            margin : auto ;
            width : 150px ;
            height : 30px ;
            transition : all ease .3s ;
        }
        .eye::before,
        .eye::after{
            content : '' ;
            position : absolute ;
            top : 0 ;
            bottom : 0 ;
            margin : auto ;
            width : 30px ;
            height : 30px ;
            border-radius : 20px ;
            background : #ffde55 ;
            box-sizing : border-box ;
            border : solid 1px #a48c00 ;
            box-shadow : 0 0 8px rgba(255,255,0 ,1)  ;
            animation : eye linear 6s infinite ;
            transition : all ease .2s ;
        }
        .eye::before{
            left : 0 ;
        }
        .eye::after{
            right : 0 ;
        }
        .text{
            display : flex ;
            justify-content : center ;
            align-items : center ;
            position : absolute ;
            z-index : 2 ;
            top : 0 ;
            left : 0 ;
            right : 0 ;
            bottom : 0 ;
            margin : auto ;
            width : 80% ;
            height : 70% ;
            font-size : 24px ;
            font-weight : bold ;
            color : transparent ;
            font-family: 'Press Start 2P', cursive;
            letter-spacing : 3px ;
            transition : all ease-out .2s ;
            
        }
        .text::before,
        .text::after{
            content : '' ;
            position : absolute ;
            width : 0 ;
            height : 2px ;
            background : #ffde55 ;
            transition : all ease-out .2s ;
            box-shadow : 0 0 8px rgba(255,255,0 ,1)  ;
        }
        .text::before{
            top : 0 ;
            left : 0 ;
        }
        .text::after{
            bottom : 0 ;
            right : 0 ;
        }
        @keyframes eye {
            0%  { height : 30px ; }
            10% { height : 30px ; }
            11% { height : 3px ; }
            12% { height : 30px ; }
            60% { height : 30px ; }
            61% { height : 3px ; }
            62% { height : 30px ; }
            63% { height : 30px ; }
            64% { height : 3px ; }
            65% { height : 30px ; }
            100%{ height : 30px ; }
        }
        .parts_A::before,
        .parts_A::after{
            background : #888 ;
            background-color:hsla(0,4%,45%,1);
            background-image:
            radial-gradient(at 40% 20%, hsla(25,10%,31%,1) 0px, transparent 50%),
            radial-gradient(at 80% 0%, hsla(188,8%,39%,1) 0px, transparent 50%),
            radial-gradient(at 0% 50%, hsla(350,2%,45%,1) 0px, transparent 50%),
            radial-gradient(at 80% 50%, hsla(340,8%,20%,1) 0px, transparent 50%),
            radial-gradient(at 0% 100%, hsla(19,0%,0%,1) 0px, transparent 50%),
            radial-gradient(at 80% 100%, hsla(29,15%,16%,1) 0px, transparent 50%),
            radial-gradient(at 0% 0%, hsla(339,0%,60%,1) 0px, transparent 50%);
        }
        .parts_A::before,
        .parts_A::after{
            content : '' ;
            position : absolute ;
            top : 0;
            width : 80px ;
            height : 80px ;
            transition : all ease .2s ;
        }
        .parts_A::before{
            right : 0 ;
            transform-origin : right center ;
            transform : rotateY(253deg) skewY(0);
        }
        .parts_A::after{
            left : 0 ;
            transform-origin : left center ;
            transform : rotateY(107deg) skewY(0);
        }
        .parts_B::before,
        .parts_B::after{
            content : '' ;
            position : absolute ;
            top : 0 ;
            right : 0 ;
            width : 240px ;
            height : 80px ;
            transition : all ease .2s ;
        }
        .parts_B::before{
            transform-origin : bottom center ;
            transform : rotatex(96deg) skewX(0deg);
            background-color:hsla(0,4%,45%,1);
            background-image:
            radial-gradient(at 40% 20%, hsla(25,10%,31%,1) 0px, transparent 50%),
            radial-gradient(at 80% 0%, hsla(188,8%,39%,1) 0px, transparent 50%),
            radial-gradient(at 0% 50%, hsla(350,2%,45%,1) 0px, transparent 50%),
            radial-gradient(at 80% 50%, hsla(340,8%,20%,1) 0px, transparent 50%),
            radial-gradient(at 0% 100%, hsla(19,0%,0%,1) 0px, transparent 50%),
            radial-gradient(at 80% 100%, hsla(29,15%,16%,1) 0px, transparent 50%),
            radial-gradient(at 0% 0%, hsla(339,0%,60%,1) 0px, transparent 50%);
        }
        .parts_B::after{
            transform-origin : top center ;
            transform : rotatex(-96deg) skewX(0deg);
            background-color:hsla(0,4%,45%,1);
            background-image:
            radial-gradient(at 40% 20%, hsla(25,10%,31%,1) 0px, transparent 50%),
            radial-gradient(at 80% 0%, hsla(188,8%,39%,1) 0px, transparent 50%),
            radial-gradient(at 0% 50%, hsla(350,2%,45%,1) 0px, transparent 50%),
            radial-gradient(at 80% 50%, hsla(340,8%,20%,1) 0px, transparent 50%),
            radial-gradient(at 0% 100%, hsla(19,0%,0%,1) 0px, transparent 50%),
            radial-gradient(at 80% 100%, hsla(29,15%,16%,1) 0px, transparent 50%),
            radial-gradient(at 0% 0%, hsla(339,0%,60%,1) 0px, transparent 50%);
        }
        .area_1:hover ~ .robot .front,
        .area_1:hover ~ .robot .face{
            transform : rotateX(20deg) rotateY(-35deg) ;
        }
        .area_1:hover ~ .robot .parts_A::before{
            transform : rotateY(207deg) skewY(-28deg);
        }
        .area_1:hover ~ .robot .parts_A::after{
            transform : rotateY(0deg) skewY(0deg);
        }
        .area_1:hover ~ .robot .parts_B::before{
            transform : rotatex(126deg) skewX(-46deg);
        }
        .area_1:hover ~ .robot .parts_B::after{
            transform : rotatex(-57deg) skewX(47deg);
            opacity : 0 ;
        }
        .area_2:hover ~ .robot .front,
        .area_2:hover ~ .robot .face{
            transform : rotateX(20deg) rotateY(0) ;
        }
        .area_2:hover ~ .robot .parts_A::before{
            transform : rotateY(300deg) skewY(-30deg);
            opacity : 0 ;
        }
        .area_2:hover ~ .robot .parts_A::after{
            transform : rotateY(60deg) skewY(30deg);
            opacity : 0 ;
        }
        .area_2:hover ~ .robot .parts_B::before{
            transform : rotatex(116deg) skewX(0deg);
        }
        .area_2:hover ~ .robot .parts_B::after{
            transform : rotatex(-57deg) skewX(0deg);
            opacity : 0 ;
        }
        .area_3:hover ~ .robot .front,
        .area_3:hover ~ .robot .face{
            transform : rotateX(20deg) rotateY(35deg) ;
        }
        .area_3:hover ~ .robot .parts_A::before{
            transform : rotateY(360deg) skewY(0deg);
        }
        .area_3:hover ~ .robot .parts_A::after{
            transform : rotateY(153deg) skewY(28deg);
        }
        .area_3:hover ~ .robot .parts_B::before{
            transform : rotatex(126deg) skewX(46deg);
        }
        .area_3:hover ~ .robot .parts_B::after{
            transform : rotatex(-57deg) skewX(-47deg);
            opacity : 0 ;
        }
        .area_4:hover ~ .robot .front,
        .area_4:hover ~ .robot .face{
            transform : rotateX(0) rotateY(-35deg) ;
        }
        .area_4:hover ~ .robot .parts_A::before{
            transform : rotateY(207deg) skewY(0);
        }
        .area_4:hover ~ .robot .parts_A::after{
            transform : rotateY(0deg) skewY(0deg);
        }
        .area_4:hover ~ .robot .parts_B::before{
            transform : rotatex(93deg) skewX(-52deg);
            opacity : 0 ;
        }
        .area_4:hover ~ .robot .parts_B::after{
            transform : rotatex(-93deg) skewX(50deg);
            opacity : 0 ;
        }
        .area_6:hover ~ .robot .front,
        .area_6:hover ~ .robot .face{
            transform : rotateX(0) rotateY(35deg) ;
        }
        .area_6:hover ~ .robot .parts_A::before{
            transform : rotateY(360deg) skewY(0deg);
        }
        .area_6:hover ~ .robot .parts_A::after{
            transform : rotateY(153deg) skewY(0);
        }
        .area_6:hover ~ .robot .parts_B::before{
            transform : rotatex(93deg) skewX(52deg);
            opacity : 0 ;
        }
        .area_6:hover ~ .robot .parts_B::after{
            transform : rotatex(-93deg) skewX(-50deg);
            opacity : 0 ;
        }
        .area_7:hover ~ .robot .front,
        .area_7:hover ~ .robot .face{
            transform : rotateX(-20deg) rotateY(-35deg) ;
        }
        .area_7:hover ~ .robot .parts_A::before{
            transform : rotateY(207deg) skewY(28deg);
        }
        .area_7:hover ~ .robot .parts_A::after{
            transform : rotateY(0deg) skewY(0deg);
        }
        .area_7:hover ~ .robot .parts_B::before{
            transform : rotatex(57deg) skewX(-47deg);
            opacity : 0 ;
        }
        .area_7:hover ~ .robot .parts_B::after{
            transform : rotatex(-126deg) skewX(46deg);
        }
        .area_8:hover ~ .robot .front,
        .area_8:hover ~ .robot .face{
            transform : rotateX(-20deg) rotateY(0) ;
        }
        .area_8:hover ~ .robot .parts_A::before{
            transform : rotateY(300deg) skewY(30deg);
            opacity : 0 ;
        }
        .area_8:hover ~ .robot .parts_A::after{
            transform : rotateY(60deg) skewY(-30deg);
            opacity : 0 ;
        }
        .area_8:hover ~ .robot .parts_B::before{
            transform : rotatex(57deg) skewX(0deg);
            opacity : 0 ;
        }
        .area_8:hover ~ .robot .parts_B::after{
            transform : rotatex(-116deg) skewX(0deg);
        }
        .area_9:hover ~ .robot .front,
        .area_9:hover ~ .robot .face{
            transform : rotateX(-20deg) rotateY(35deg) ;
        }
        .area_9:hover ~ .robot .parts_A::before{
            transform : rotateY(360deg) skewY(0deg);
        }
        .area_9:hover ~ .robot .parts_A::after{
            transform : rotateY(153deg) skewY(-28deg);
        }
        .area_9:hover ~ .robot .parts_B::before{
            transform : rotatex(57deg) skewX(47deg);
            opacity : 0 ;
        }
        .area_9:hover ~ .robot .parts_B::after{
            transform : rotatex(-126deg) skewX(-46deg);
        }
        .area_1:hover ~ .robot .eye{
            transform : translate(-16px , -8px ) ;
        }
        .area_4:hover ~ .robot .eye{
            transform : translate(-16px , 0 ) ;
        }
        .area_7:hover ~ .robot .eye{
            transform : translate(-16px , 8px ) ;
        }
        .area_2:hover ~ .robot .eye{
            transform : translate( 0 , -8px ) ;
        }
        .area_8:hover ~ .robot .eye{
            transform : translate( 0 , 8px ) ;
        }
        .area_3:hover ~ .robot .eye{
            transform : translate(16px , -8px ) ;
        }
        .area_6:hover ~ .robot .eye{
            transform : translate(16px , 0 ) ;
        }
        .area_9:hover ~ .robot .eye{
            transform : translate(16px , 8px ) ;
        }
        .robot:hover .eye::before,
        .robot:hover .eye::after{
            height : 3px ;
            animation-play-state : paused ;
            animation : hover ease .5s ;
            animation-fill-mode : forwards ;
        }
        .robot:hover .text{
            color : #ffde55 ;
            text-shadow : 0 0 4px #ffde55 ;
        }
        .robot:hover .text::before,
        .robot:hover .text::after{
            width : 100% ;
        }
        @keyframes float {
            0%  { 
                transform : translate( 0 , 0 ) ;
            }
            100%{ 
                transform : translate( 0 , 20px ) ;
            }
        }
        @keyframes shadow {
            0%  { 
                transform : scale( 1 ) ;
                opacity : .5 ;
            }
            100%{ 
                transform : scale( 1.2 ) ;
                opacity : 1 ;
            }
        }
        @keyframes hover {
            0%  { 
                opacity : 1 ;
            }
            100%{ 
                opacity : 0 ;
            }
        }


        /* 本体には関係ないスタイル */
        .container{
            width : 100% ;
            height : 600px ;
            display : flex ;
            flex-direction : column ;
            justify-content : center ;
            align-items : center ;
            background : #8698a3 ;
        }
        .button:not(:last-child){
            margin-bottom : 60px ;
        }

    </style>

</head>
<body style="background-color:#8698A3;">
    <div style="display:flex;margin-top:2%">
        <div style="margin-left:20%;">➀会員情報の登録</div>
        <div style="margin-left:15%;">➁入力内容の確認</div>
        <div style="margin-left:15%;margin-right:5%;">➂登録完了</div>
    </div>

    <div style="text-align:center;
        margin-top:8%;">
        <h1>アカウントの登録が完了しました！</h1>
        <h1>不満を書き込んでポイントをGETしましょう！</h1>
    </div>
    <div class="container">
  
    <!--  
      SafariでtransformがバグるのでChrome限定です

      works only in chrome
    -->

    <div class="box">
        <div class="area area_1"></div>
        <div class="area area_2"></div>
        <div class="area area_3"></div>
        <div class="area area_4"></div>
        <div class="area area_5"></div>
        <div class="area area_6"></div>
        <div class="area area_7"></div>
        <div class="area area_8"></div>
        <div class="area area_9"></div>
        <a href="#" class="robot">
            <div class="front parts_A"></div>
            <div class="front parts_B"></div>
            <div class="face">
                    <div class="face__wrapper">
                        <div class="eye"></div>
                        <span class="text">LOGIN</span>
                    </div>
            </div>
        </a>
    </div>

</div>
    <!-- <div style="text-align:center;margin-top:10%;">
    <input type='submit'value="ログイン画面へ" style="background-color:" onmouseover="this.style.background=''" onmouseout="this.style.background=''">
    </div> -->
</body>
</html>