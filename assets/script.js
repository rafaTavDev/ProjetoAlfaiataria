/* VARIÁVEIS */
let btEsq = document.querySelector(".botao-esq")
let btDir = document.querySelector(".botao-dir")
let quantSlides = document.querySelectorAll(".projetos-img").length
let margemSlide = document.querySelector(".projetos-grid")
let idxSlideAtual = 0


/* FUNÇÕES */
function cliqueDireita(){
    if(idxSlideAtual < (quantSlides - 1)){
        idxSlideAtual++
        margemSlide.style.marginLeft = `calc(-0.8*0.9*100vw*${idxSlideAtual})`
    }
}

function cliqueEsquerda(){
    if(idxSlideAtual > 0){
        idxSlideAtual--
        margemSlide.style.marginLeft = `calc(-0.8*0.9*100vw*${idxSlideAtual})`
    }
}

console.log(quantSlides)



/* EVENTOS */
btDir.addEventListener("click", cliqueDireita)
btEsq.addEventListener("click", cliqueEsquerda)