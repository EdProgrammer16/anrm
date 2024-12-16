var hero = document.querySelector(".bg-slide");
var i = 1;
const bgSlide = () => {
    i = ( i > 8) ? 1: i;
    hero.style.backgroundImage = `url(<?= DIRIMG; ?>/img/hero-carousel/hero-carousel-${i}.JPG)`;
    console.log(hero.style.backgroundImage);
    console.log(i);
    i++;
}

setInterval(function(){bgSlide()}, 5000);
