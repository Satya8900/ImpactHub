// Number Counting Animation

let valueDisplays = document.querySelectorAll(".num");
let interval = 4000;
let called = false
let page = document.body.className;
// console.log(page);

switch (page) {
       case 'index':
              window.addEventListener('scroll', () => {
                     const scrolled = window.scrollY;
                     const checkpoint = 1300;
                     // console.log(scrolled)

                     if (scrolled >= checkpoint && called === false) {
                            valueDisplays.forEach((valueDisplay) => {
                                   let startValue = 0;
                                   let endValue = parseInt(valueDisplay.getAttribute("data-val"));
                                   let duration = Math.floor(interval / endValue);
                                   let counter = setInterval(function () {
                                          startValue += 1;
                                          valueDisplay.textContent = startValue;
                                          if (startValue == endValue) {
                                                 clearInterval(counter);
                                          }
                                   }, duration);
                            });
                            called = true;
                     }
              })
              break;
       case 'donation':
              window.addEventListener('scroll', () => {
                     const scrolled = window.scrollY;
                     const checkpoint = 770;
                     // console.log(scrolled)

                     if (scrolled >= checkpoint && called === false) {
                            valueDisplays.forEach((valueDisplay) => {
                                   let startValue = 0;
                                   let endValue = parseInt(valueDisplay.getAttribute("data-val"));
                                   let duration = Math.floor(interval / endValue);
                                   let counter = setInterval(function () {
                                          startValue += 1;
                                          valueDisplay.textContent = startValue;
                                          if (startValue == endValue) {
                                                 clearInterval(counter);
                                          }
                                   }, duration);
                            });
                            called = true;
                     }
              })
              break;
       default:
}