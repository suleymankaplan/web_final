

//FİLTRE ANİMASYONU


const filter=document.querySelectorAll(".filter")
const filterBoxes=document.querySelectorAll(".filter-size")
filter.forEach(a => {
    a.children[0].addEventListener('click',()=>{
        if(a.children[1].style.display=="none"){
            a.style.height="150px"
            for(let i=0;i<a.children[1].children.length;i++){
                setTimeout(() => {
                    a.children[1].children[i].style.opacity=1
                }, 100);
            }
            a.children[1].style.display="flex"
        }
        else if(a.children[1].style.display=="flex"){
            a.style.height="60px"
            for(let i=0;i<a.children[1].children.length;i++){
                a.children[1].children[i].style.opacity=0
                setTimeout(() => {
                    a.children[1].style.display="none"
                }, 500);
            }
        }
    })
});


//FİLTRELEME SİSTEMİ


filterBoxes.forEach(box=>{
    box.addEventListener('click',()=>{
        if(box.style.backgroundColor!="black"){
            console.log(box.parentElement.children.length)
            if((box!=filterBoxes[2]||box!=filterBoxes[3])){
            for(let i=0;i<box.parentElement.children.length;i++){
                if(box.parentElement.children[i].style.backgroundColor=="black"){
                    if(box!=filterBoxes[2]&&box!=filterBoxes[3]&&box!=filterBoxes[4]&&box!=filterBoxes[5]&&box!=filterBoxes[6]){
                        box.parentElement.children[i].style.backgroundColor="white"
                        box.parentElement.children[i].style.color="black"
                        box.parentElement.children[i].setAttribute("class","filter-size")
                    }
                }
            }
        }
            box.style.backgroundColor="black"
            box.style.color="white"
            box.setAttribute("class","filter-size selected-filter")
        }
        else{
            box.style.backgroundColor="white"
            box.style.color="black"
            box.setAttribute("class","filter-size")
        }
    })
})
function filterApply(){
    const selectedFilters=document.querySelectorAll(".selected-filter")
    let className=[]
    selectedFilters.forEach(filter=>{
        switch (filter.textContent) {
            case "Stokta Var":
                className.push("stokta")
                break;
            case "Stokta Yok":
                className.push("stokta-yok")
                break;
            case "Tişört":
                className.push("tisort")
                break;
            case "Hoodie":
                className.push("hoodie")
                break;
            case "XS":
                className.push(" xs")
                break;
            case "S":
                className.push(" s ")
                break;
            case "M":
                className.push(" m")
                break;
            case "L":
                className.push(" l")
                break;
            case "XL":
                className.push(" xl")
                break;
            case "Siyah":
                className.push("siyah")
                break;
            case "Sarı":
                className.push("sari")
                break;
            case "Beyaz":
                className.push("beyaz")
                break;
            case "Mavi":
                className.push("mavi")
                break;
        }
    })
    let check=0
    productBox.forEach(x=>{
        check=0
        for(let i=0;i<className.length;i++){
            if(x.classList.value.includes(className[i]))
                check++
        }
        if(check==className.length)
            x.style.display="flex"
        else{
            x.style.display="none"
        }
    })
}


//ÜRÜNÜN MOUSE ÜZERİNDEYKEN RESMİN DEĞİŞMESİ


const productBox=document.querySelectorAll(".product-box")
productBox.forEach(box=>{
    box.addEventListener('mouseover',()=>{
        let srcText=box.children[0].getAttribute("src")
        srcText=srcText.slice(0,srcText.length-6)+"2"+srcText.slice(srcText.length-5)
        box.children[0].style.animation=""
        box.children[0].setAttribute("src",srcText)
    })
    box.addEventListener('mouseout',()=>{
        let srcText=box.children[0].getAttribute("src")
        srcText=srcText.slice(0,srcText.length-6)+"1"+srcText.slice(srcText.length-5)
        box.children[0].setAttribute("src",srcText)
    })
    //veriyi storage'a aktarma
    box.addEventListener('click',()=>{
        let srcText=box.children[0].getAttribute("src")
        let title=box.children[1].children[0].textContent
        let price=box.children[1].children[1].textContent
        localStorage.setItem("resim",srcText)
        localStorage.setItem("başlık",title)
        localStorage.setItem("fiyat",price)
        localStorage.setItem("class ismi",box.classList.value)
    })
})

//home'daki veriyi aktarma

const newProduct=document.querySelectorAll(".new-product")
newProduct.forEach(product=>{
    product.addEventListener('click',()=>{
        let srcText=product.children[0].getAttribute("src")
        let title=product.children[1].children[0].textContent
        let price=product.children[1].children[1].textContent
        localStorage.setItem("resim",srcText)
        localStorage.setItem("başlık",title)
        localStorage.setItem("fiyat",price)
    })
})

//PRODUCT SAYFASINA VERİ AKTARMA

document.addEventListener("DOMContentLoaded",function(){
    const pageId=document.querySelector("body").getAttribute("class")
    if(pageId=="product-page"){
        let img=document.querySelector(".product-image")
        let title=document.querySelector(".product-title")
        let price=document.querySelector(".product-price")
        price.textContent=localStorage.getItem("fiyat")
        title.textContent=localStorage.getItem("başlık")
        let srcText=localStorage.getItem("resim")
        img.children[0].children[1].setAttribute("src",srcText)
        srcText=srcText.slice(0,srcText.length-6)+"1"+srcText.slice(srcText.length-5)
        img.children[0].children[0].setAttribute("src",srcText)

        //olmayan bedenleri seçilemez yapma

        const productSizeButtons=document.querySelectorAll(".product-size-box")
        productSizeButtons.forEach(button=>{
            if(localStorage.getItem("class ismi").includes(" "+button.textContent.toLowerCase()+" ")){}
            else{
                button.setAttribute("class","product-size-box not-available")
                button.style.opacity=0.3
            }
        })
    }
    else{
        localStorage.clear();
    }
    
})
const sizeBoxes=document.querySelectorAll(".product-size-box")
sizeBoxes.forEach(box=>{
    box.addEventListener('click',()=>{
        sizeBoxes.forEach(sizeBox=>{
            if(sizeBox.style.backgroundColor=="black"){
                sizeBox.style.backgroundColor="white"
                sizeBox.style.color="black"
            }
        })
        if(box.classList.value!="product-size-box not-available"){
            box.style.backgroundColor="black"
            box.style.color="white"
        }
    })
})

//SEPETE EKLE EVENTİ


const cartButton=document.querySelectorAll('.add-cart-button')

cartButton.forEach(button=>{
    button.addEventListener('click', (event)=> {
        event.preventDefault();
        event.stopPropagation();
      })
})

//KAYDIRILABİLİR MENÜ

const prevButton=document.querySelector(".prev-button")
const nextButton=document.querySelector(".next-button")
const productContent=document.querySelector(".new-product-content")
var currentIndex=0
if(document.querySelector("body").className=="home-page"){
    prevButton.addEventListener('click',()=>{
        if(currentIndex>0){
            currentIndex-=270
            productContent.style.transform=`translateX(-${currentIndex}px)`
        }
        console.log(currentIndex)
    })
    nextButton.addEventListener('click',()=>{
        if(currentIndex<=productContent.parentElement.offsetWidth){
            currentIndex+=270
            productContent.style.transform=`translateX(-${currentIndex}px)`
        }
    })
}

//ÜRÜNLERDE RESİM KAYDIRMA

const productPrevButton=document.querySelector(".product-prev-button")
const productNextButton=document.querySelector(".product-next-button")
const productImageContent=document.querySelector(".slidable-images")
var imageIndex=0
if(document.querySelector("body").className=="product-page"){
    productPrevButton.addEventListener('click',()=>{
        if(imageIndex!=0){
            console.log("a")
            productImageContent.style.transform=`translateX(0px)`
            imageIndex++
        }
    })
    productNextButton.addEventListener('click',()=>{
        if(imageIndex!=1){
            console.log("a")
            productImageContent.style.transform=`translateX(-${productImageContent.parentElement.offsetWidth}px)`
            imageIndex--
        }
    })
}

//ÜRÜN SAYISI ARTTIRMA - AZALTMA
const increaseButton=document.querySelector(".cart-increase-button")
const decreaseButton=document.querySelector(".cart-decrease-button")
function increase(){
    increaseButton.parentElement.children[1].textContent++
}
function decrease(){
    if(increaseButton.parentElement.children[1].textContent>1)
        decreaseButton.parentElement.children[1].textContent--
}