const buttons = document.querySelector('.buttonsCarousel');
const images = document.querySelector('.imagesCarousel');
const imageWidth = images.clientWidth;
const IMAGE_CHANGE_DELAY = 3000;
let imageIndex = 0;

for (let i = 0; i < buttons.children.length; i++) {
    const btn = buttons.children[i];
    btn.addEventListener('click', function () {
        unCheckAllBtns();
        btn.classList.add('active');
        changeImage(i);
    });
}

function unCheckAllBtns() {
    for (const btn of buttons.children) {
        btn.classList.remove('active');
    }
}

function changeImage(index) {
    let position = imageWidth * imageIndex;
    const interval = setInterval(slide, 1);

    function slide() {
        if (position === imageWidth * index) {
            imageIndex = index;
            clearInterval(interval);
        } else {
            if (index > imageIndex) {
                position += 10;
            } else if (index < imageIndex) {
                position -= 10;
            }
            images.style.left = '-' + position + 'px';
        }
    }
}

function nextSlide() {
    unCheckAllBtns();

    let index = imageIndex + 1;

    if (index === buttons.children.length) {
        index = 0;
    }

    buttons.children[index].classList.add('active');
    changeImage(index);
}

setInterval(() => !document.hidden && nextSlide(), IMAGE_CHANGE_DELAY);