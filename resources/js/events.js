//DROPDOWN
$(".burger-btn, .user-btn").on("click", function () {
    $(".drop-down-container").toggleClass("scale-drop-down");
    $(".drop-down-element").toggleClass("max-opacity");
});
$(".sign-out").on("click", function() {
    $.ajax({url: "/logout", success: function () {
            window.location = "/login";
     }});
});

//PRODUCT PAGE
let url = "", type = "";
$(".edit-btn").on('click', function () {
    $('.modal-wrapper').toggle();
    let productRow = $(this).parents('.table-row');
    let modalContainer = $('.modal-container');
    const productID = productRow.attr('data-product-id');
    const productFields = productRow.children('[data-product]');
    const productFieldsModal = modalContainer.children('[data-product]');
    url = "/product/" + productID;
    type="PUT";

    modalContainer.attr('data-product-id', productID);
    for(let index = 0;index < productFields.length; index++) {
        productFieldsModal[index].value = productFields[index].textContent;
    }

});

$('.create-btn').on('click', function() {
    $('.modal-wrapper').toggle();
    url = "/product";
    type = "POST";
});

$(".save-btn").on('click', function () {
    let product = $(this).parent('.modal-container');
    const productID = product.attr('data-product-id');
    const productFields = product.children('[data-product]');
    console.log(productFields);

    $.ajax({
        type: type,
        url: url,
        data: {
            'id': productID,
            'heading': productFields[0].value,
            'price': productFields[1].value,
            'description': productFields[2].value,
        },
    })
        .done(response => {
            $('.modal-wrapper').toggle();
            window.location = "/product";
        })
});

$('.delete-btn').on('click', function () {
    let productID = $(this).parents('.table-row').attr('data-product-id');

    $.ajax({
        type: 'DELETE',
        url: '/product',
        data: {
            'id': productID,
        },
    })
        .done(response => {
            window.location = "/product";
        })


});

$(".close-btn").on('click', function () {
    const parent = $('.modal-container');
    const productFieldsModal = parent.children('[data-product]');

    for(let index = 0;index < productFieldsModal.length; index++) {
        productFieldsModal[index].value = "";
    }
    $('.modal-wrapper').toggle();
})

// AUTH PAGES
$(".eye-icon, .closed-eye-icon").on("click", function () {
    $(".eye-icon").toggleClass("hidden");
    $(".closed-eye-icon").toggleClass("hidden");

    const passwordField = $(".password-input");
    passwordField.attr("type") === "password" ? passwordField.attr("type", "text") : passwordField.attr("type", "password");
});

// HOME PAGE
$(".apply-filter-btn").on('click', function () {
    const filterOne = $("#select-one option:selected").text(),
       filterTwo = $("#select-two option:selected").text();
    //TODO verify selected data
    $.ajax({
        type: "POST",
        url: "/filter",
        data: {
            filterOne: filterOne,
            filterTwo: filterTwo
        },
        })
       .done(response => {
           repopulateProducts(response.data);
       })

});

function repopulateProducts(products) {
    const homeContainer = $('#home-container');
    homeContainer.find('.product-cart-container').remove();
    products.forEach(product => {
        homeContainer.prepend(constructProductCart(product));
    });
}
function constructProductCart(product) {
    return `<div class="product-cart-container column">` +
                `<div class="product-image">` +
                    `<img src="https://source.unsplash.com/random" alt="some">` +
                `</div>` +
                `<div class="product-cart-down-part column">` +
                     `<h3 class="product-title"> ${product.data.attributes.heading} </h3>` +
                     `<p class="product-description"> ${product.data.attributes.description} </p>` +
                `</div>`+
                `<span class="price-banner"> ${ product.data.attributes.price } </span>` +
            `</div>`
}
