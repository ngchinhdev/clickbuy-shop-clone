const fHours = document.querySelector(".hour.ten");
const sHours = document.querySelector(".hour.one");
const fMinutes = document.querySelector(".minute.ten");
const sMinutes = document.querySelector(".minute.one");
const fSeconds = document.querySelector(".sec.ten");
const sSeconds = document.querySelector(".sec.one");

function startCountDown(endTime) {
  const restart = setInterval(function () {
    const now = new Date().getTime();
    const timeremaining = endTime - now;
    const hour = Math.floor((timeremaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minute = Math.floor((timeremaining % (1000 * 60 * 60)) / (1000 * 60));
    const second = Math.floor((timeremaining % (1000 * 60)) / 1000);

    fHours.innerText = Math.floor(hour / 10);
    sHours.innerText = hour % 10;
    fMinutes.innerText = Math.floor(minute / 10);
    sMinutes.innerText = minute % 10;
    fSeconds.innerText = Math.floor(second / 10);
    sSeconds.innerText = second % 10;

    if (timeremaining < 2000) {
      clearInterval(restart);
      const initialEndTime = new Date().getTime() + 4 * 60 * 60 * 1000;
      localStorage.setItem("endTime", initialEndTime);
      startCountDown(initialEndTime);
    }
  }, 1000);
}

const storedEndTime = localStorage.getItem("endTime");

if (storedEndTime) {
  startCountDown(storedEndTime);
} else {
  const initialEndTime = new Date().getTime() + 4 * 60 * 60 * 1000;
  localStorage.setItem("endTime", initialEndTime);
  startCountDown(initialEndTime);
}
