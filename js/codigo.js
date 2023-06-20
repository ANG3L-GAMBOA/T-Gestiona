$(function(){

    //Producto
    $(".btn-editar-prod").click(function(e){
        let cod_prod = $(this).closest(".fila").children(".cod-prod").text();

        location.href = "editar_producto.php?cod_prod=" + cod_prod;
    });

    $(".btn-borrar-prod").click(function(e){
        let cod_prod = $(this).closest(".fila").children(".cod-prod").text();

        // alert(cod_prod);
        if (confirm("¿Seguro de borrar?"))
            location.href = "../controller/ctr_borrar_prod.php?cod_prod=" + cod_prod;
    });


    //Marca
    $(".btn-editar-mar").click(function(e){
        let cod_mar = $(this).closest(".fila").children(".cod-mar").text();

        location.href = "editar_marca.php?cod_mar=" + cod_mar;
    });

    $(".btn-borrar-mar").click(function(e){
        let cod_mar = $(this).closest(".fila").children(".cod-mar").text();

        // alert(cod_mar);
        if (confirm("¿Seguro de borrar?"))
            location.href = "../controller/ctr_borrar_marc.php?cod_mar=" + cod_mar;
    });

    //Categoria
    $(".btn-editar-cat").click(function(e){
        let cod_cat = $(this).closest(".fila").children(".cod-cat").text();

        location.href = "editar_categoria.php?cod_cat=" + cod_cat;
    });

    $(".btn-borrar-cat").click(function(e){
        let cod_cat = $(this).closest(".fila").children(".cod-cat").text();

        // alert(cod_mar);
        if (confirm("¿Seguro de borrar?"))
            location.href = "../controller/ctr_borrar_cat.php?cod_cat=" + cod_cat;
    });

    //User
    $(".btn-editar-user").click(function(e){
        let cod_user = $(this).closest(".fila").children(".cod-user").text();

        location.href = "editar_usuario.php?cod_user=" + cod_user;
    });

    $(".btn-borrar-user").click(function(e){
        let cod_user = $(this).closest(".fila").children(".cod-user").text();

        // alert(cod_mar);
        if (confirm("¿Seguro de borrar?"))
            location.href = "../controller/ctr_borrar_user.php?cod_user=" + cod_user;
    });

    $(".btn-login").click(function(e){
        let user = $(this).closest(".form-login").children(".usuario").text();

        let contra = $(this).closest(".form-login").children(".contra").text();

        
        location.href = "../controller/ctr_login.php?user=" + user + "&contra=" + contra;
    });
});