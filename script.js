
;(function($){

    $(document).ready(function(){

        $(".login").on("click", function(){
            $(".login_active").text("Login");
            $(".action_name").val("login")
        })

        $(".register").on("click", function(){
            $(".login_active").text("Register");
            $(".action_name").val("register")
        })

       

    })


})(jQuery)
   

