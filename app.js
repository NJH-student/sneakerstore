const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [
    {
        id: 1,
        title: "Air Force",
        price: 119,
        colors: [
            { code: "black", 
              img: "./img/Product/air.png",
            },
            { 
                code: "darkblue",
                img: "./img/Product/air2.png",
            }, 
        ]
    },
    { 
        id: 2,
        title: "Air Jordan",
        price: 149,
        colors: [
            { code: "lightgray", 
              img: "./img/Product/jordan.png",
            },
            { 
                code: "green",
                img: "./img/Product/jordan2.png",
            }, 
        ]
    },
    {
        id: 3,
        title: "Blazer",
        price: 109,
        colors: [
            { code: "lightgray", 
              img: "./img/Product/blazer.png",
            },
            { 
                code: "green",
                img: "./img/Product/blazer2.png",
            }, 
        ]
    },
    {
        id: 4,
        title: "Crater",
        price: 89,
        colors: [
            { code: "black", 
              img: "./img/Product/crater.png",
            },
            { 
                code: "lightgray",
                img: "./img/Product/crater2.png",
            }, 
        ]
    },
    {
        id: 5,
        title: "Hippie",
        price: 99,
        colors: [
            { code: "gray", 
              img: "./img/Product/hippie.png",
            },
            { 
                code: "black",
                img: "./img/Product/hippie2.png",
            }, 
        ]
    },
    {
        id: 6,
        title: "Pokemon",
        price: 600,
        colors: [
            { code: "yellow", 
              img: "https://cdn.corenexis.com/i/d/jl3/5aYI4L.png?token=36feef65f278b78295520860f741e2e5",
            },
            { 
                code: "purple",
                img: "https://cdn.corenexis.com/i/d/jl3/cOEeT0.png?token=f34bd391e3e877dbab09f9f1e24f8bff",
            }, 
        ]
    },
];

let choosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductColors = document.querySelectorAll(".color");
const currentProductSizes = document.querySelectorAll(".size");
menuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
        //change the current slide
        wrapper.style.transform = `translateX(${-100 * index}vw)`;

        //change the choosen product
        choosenProduct = products[index];

        //change text of currentProduct
        currentProductTitle.textContent = choosenProduct.title;
        currentProductPrice.textContent = "RM" + choosenProduct.price;
        currentProductImg.src = choosenProduct.colors[0].img;

        //assing new colors
        currentProductColors.forEach((color, index) => {
            color.style.backgroundColor = choosenProduct.colors[index].code;
        });
    });
});

currentProductColors.forEach((color, index) => {
    color.addEventListener("click", () => {
        //change current color
        currentProductImg.src = choosenProduct.colors[index].img;
    });
});

currentProductSizes.forEach((size, index) => {
    size.addEventListener("click", () => {
        //remove selected from all sizes
        currentProductSizes.forEach((size) => {
            size.style.backgroundColor = "white";
            size.style.color = "black";
        });
        //add selected to the clicked size
        size.style.backgroundColor = "black";
        size.style.color = "white";
    });
});

const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");

productButton.addEventListener("click", () => {
    payment.style.display = "flex";
});

close.addEventListener("click", () => {
    payment.style.display = "none";
});