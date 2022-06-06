require('./bootstrap');

const theme = document.querySelector("#theme");
const body = document.querySelector("body"); 

window.matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', event => {
  if (event.matches) {
   // dark();
  } else { 
  }
});

if (window.matchMedia &&  window.matchMedia('(prefers-color-scheme: dark)').matches) {
     
  }
load();



function load() { 
    const darkmode = localStorage.getItem('theme')
    if (!darkmode) {
        store('false'); 
    } else if (darkmode == 'true') {

        body.classList.toggle('darkmode'); 
    }
}

function store(value) {

    localStorage.setItem('theme', value);
}



theme.addEventListener('click', e => {
    body.classList.toggle('darkmode');
    store(body.classList.contains('darkmode'));
});

 
 
/* header */


/*

<script>
    setTimeout(function(){ 


        const header = document.querySelector('header');
        const header_2 = document.querySelector('.header__container__2');
        const header_2_title = document.querySelector('.header__container__2 .title');
        if (header_2_title) {
            document.documentElement.style.setProperty(
                '--background-header', 'var(--background-header-color2)'
            );
            header_2.classList.add('header__container__secion2');
        } else{

            header_2.classList.add('notvisible');
        }
}, 0.1);
</script>


document.documentElement.style.setProperty(
    '--background-header', 'var(--background-header-color2)'
  );
/* Intentto de menu
const btnMenu = document.querySelectorAll(".subMenubtn");
for (let i = 0; i < btnMenu.length; i++) {
    btnMenu[i].addEventListener("click", function() {
        const submenu = this.nextElementSbling;

        const height = "submenu.offsetHeight";
        if (submenu.classList.contains("desplegar")) {
            submenu.classList.remove("desplegar");
            submenu.removeAttribute("style");
        } else {

            submenu.classList.add("desplegar");
            submenu.style.height = "0px";
        }
        console.log("siu");
    });
}
*/

const carouselcontainer = document.querySelector('.carousel');
const carousel = document.querySelector('.carousel__items');
if(carousel){
    
    const carouselFooter = document.querySelector('.main__container__footer');
    const totalCarouselItem = carousel.childElementCount;
        
    var anchoCarousel =carouselcontainer.offsetWidth;
    var espacioItem, sobrante,gap,totalItem,nuevogap;

    function newGap(){

        espacioItem =totalItem*300;
        sobrante = anchoCarousel - espacioItem;
        gap = (sobrante / (totalItem -1)).toFixed(2);
        return  gap ;
    }

    function updateCarousel(){
        anchoCarousel =carousel.offsetWidth;

        totalItem =Math.floor(anchoCarousel / 330);
        nuevogap = newGap() ;
        if(nuevogap <30){
        totalItem= totalItem-1;
            nuevogap = newGap() ;
        } 
        carousel.style.columnGap=nuevogap + 'px'; 
        var totalButton = totalCarouselItem / totalItem;
        var temporal = totalCarouselItem % totalItem;
        if(temporal >0){
            totalButton = totalButton + 1 ;
        } 
        
        const buttons = document.querySelector('.button_carousel');
        const buttonExist = document.querySelector('.button_carousel input');
        if(buttonExist){
            buttons.innerHTML="";
        }



          
        for (var i =0 ; i< totalButton-1; i++){ 

            const button = document.createElement("input");
            button.setAttribute('type', 'radio');
        
            button.dataset.id = i;
            button.name = 'Button_carousel';
            buttons.appendChild(button);   
        }
         


 

        
        carouselFooter.addEventListener("click", function(e) {


            const button = e.target;
            if (button.tagName == "INPUT") {
               const valor = (Number(button.dataset.id) * (Number(anchoCarousel) + Number(gap)) * -1); 
               
               
               carousel.style.marginLeft =  valor + 'px';
               
            }
        });  

    }
    updateCarousel();
    window.addEventListener('resize', updateCarousel);

    var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var temporal;

/* Like */  

const elems = document.querySelectorAll('.likecontainer')

elems.forEach(function(elem){
    btn  = elem.querySelector('.iconBtn') 
    btn.addEventListener('click', (e)=>{
        var nftId = e.currentTarget.dataset.nftId; 
        var likeCount = elem.querySelector('.LikeCount')
        if (elem.classList.contains('likeActivo')){
            var likeId = elem.querySelector('.likeId');  
            elem.classList.remove("likeActivo"); 
            likeCount.textContent = Number(likeCount.textContent)  -1;  
            axios.delete('/nfts/' + nftId +'/likes/' +  likeId.value, {nft:nftId, like:likeId},
             { headers:{ 'X-CSRF-TOKEN':laravelToken} }).then(
                (response) => {
                    likeId.value='';
                });

        }
        else{
            var likeId = elem.querySelector('.likeId');
            likeCount.textContent = Number(likeCount.textContent) + 1; 

            var likeCount = elem.querySelector('.LikeCount')
            elem.classList.add("likeActivo"); 
            axios.post('/nfts/' + nftId +'/likes', {nft:nftId}, { headers:{ 'X-CSRF-TOKEN':laravelToken} }).then(
                (response) => {
                    temporal =response.data;  
                    likeId.value=temporal; 
                });
        }


    })


    
})

 

} 
    /* 

    import Alpine from 'alpinejs';

    window.Alpine = Alpine;

    Alpine.start();

    */
   const form_nft = document.querySelector('.container_form_nft');
    if(form_nft){ 
        const dropArea = document.querySelector('.drop_area'),
        imgNft = document.querySelector('.nft_img .imgNft')
        if(imgNft){
            if(imgNft.src != window.location){ 
                imgNft.style.opacity='1';
            }
        }
        const fileInput = document.querySelector('.inputFile');
        const preview = document.querySelector('.imgNft');
        const reader = new FileReader();
        const buttonImage = document.querySelector('.drop_area button');
           
        function handleEvent(event) {
            
            if (event.type === "load") {
                preview.src = reader.result;
                preview.style.opacity='1';
            }
        }

        function addListeners(reader) {
            reader.addEventListener('loadstart', handleEvent);
            reader.addEventListener('load', handleEvent);
            reader.addEventListener('loadend', handleEvent);
            reader.addEventListener('progress', handleEvent);
            reader.addEventListener('error', handleEvent);
            reader.addEventListener('abort', handleEvent);
        }

        function handleSelected(e) { 
            const selectedFile = fileInput.files[0];
            buttonImage.textContent = selectedFile.name;
            if (selectedFile) {
                addListeners(reader);
                reader.readAsDataURL(selectedFile);
            }
        }

        fileInput.addEventListener('change', handleSelected);
 
        buttonImage.addEventListener("click",(e)=>{
            fileInput.click();

        });
        dropArea.addEventListener("dragover",(e)=>{
            e.preventDefault();
            dropArea.classList.add('active');
            buttonImage.textContent="Drop the file here";

        });
        
        dropArea.addEventListener("dragleave",(e)=>{
            e.preventDefault();
            buttonImage.textContent="PNG, JPG, GIF, WEBP or MP4. Max 200mb.";
            dropArea.classList.remove('active');

        });
        dropArea.addEventListener("drop",(e)=>{
            e.preventDefault();
            buttonImage.textContent="PNG, JPG, GIF, WEBP or MP4. Max 200mb.";
            dropArea.classList.remove('active');

        });

        const title = document.querySelector('.title'),
        price = document.querySelector('.price'),
        inputTitle = document.querySelector("#title"),
        inputPtrice = document.querySelector("#price");
        let valorinput,valor, signo;

        inputPtrice.addEventListener("input", function(e) {
            signo ='';
            /*const active = document.querySelector('.active');
            if(active){
                active.classList.remove('active');
            }
       
            inputTitle.classList.add('active'); */
            valor =  e.target.value;
        /*
        
        valor = valorinput;

        if (valor != null && valor.length > 0) {
            if(valor>=1000 && valor<=99999){
                valor = (valor * 0.01); 
                signo = ' K';
            }
        }else{
            
            valor="Price"; 
        }
        
        */
            price.textContent=valor + signo + ' ETH';
           





        });  
        inputTitle.addEventListener("input", function(e) {
            
            valor = e.target.value;
            title.textContent=valor;
        });
    }
    