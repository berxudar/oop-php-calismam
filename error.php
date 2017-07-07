<style>
    *{

        margin:0;
        padding:0;
    }
    body{

        width:100%;
        height:100%;
    }
    @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400');
    
    @import url('https://fonts.googleapis.com/css?family=Bubbler+One');
 .error-custom{

        border-radius:2px;
        background-color: #ee6e73;
        padding:1em;
        margin:0.2em;
        display:block;color:#fff;
        text-align: justify;
        font-family: 'Roboto', sans-serif;
     animation: anim 0.8s;

        
    }
    
    span.error-span{

        
    font-family: 'Bubbler One', sans-serif;

    }


    @keyframes anim {

       10%{

            background: mediumvioletred;
            transition: all;
           border-top:1px lightsteelblue;
        }
    }
</style>
<?php
ini_set("error_prepend_string", "<p><span class='error-span'>ooops error !</span><pre></p><div class='error-custom'>");
