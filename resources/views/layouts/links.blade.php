<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/slick.css') }}" rel="stylesheet">
<link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!--DNE-->
<style>
*[contenteditable]:focus {
border:1px dashed black;
outline:none;
}
.custom-menu {
position: absolute;
z-index: 1001;
}
.custom-menu li a {
padding: 6px 14px;
margin-bottom: 1px;
background-color: rgba(0, 0, 0, 0.9);
border: 0;
color: white;
font-weight: 100;
font-size: 12px;
transition: all 1s linear;
display: block;
}
.custom-menu li a:hover {
background: #000;
}
.custom-menu li {
margin-bottom: 1px;
}
button.contentEditBtn {
position: absolute;
right: 0;
background: #e40a0a;
color: white;
padding: 7px 8px;
border: none;
}
button.contentEditBtn.contentEditBtnLess {
right: 46px;
}
</style>