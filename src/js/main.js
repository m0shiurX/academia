$(document).ready(()=>{
    $(".logo").click(()=> {
        console.log('clicked');
        $(".minimal-menu").toggleClass("floating-menu");
        $(".menu-bar").slideToggle();
    });
});