setInterval(setClock, 1000)

const hourHand = document.querySelector('.hour')
const minuteHand = document.querySelector('.minute')
const secondHand = document.querySelector('.second')
const displayTime = document.querySelector('.time')

function setClock() {
  const currentDate = new Date()
  const secondsRatio = currentDate.getSeconds() / 60
  const minutesRatio = (secondsRatio + currentDate.getMinutes()) / 60
  // Calculate the hours in 12-hour format
  const hours = currentDate.getHours() % 12 || 12
  // Calculate the rotation ratio for the hour hand based on the hours
  const hoursRatio = (minutesRatio + hours) / 12

  // Set the rotation for the hands
  setRotation(secondHand, secondsRatio)
  setRotation(minuteHand, minutesRatio)
  setRotation(hourHand, hoursRatio)

  // Display the time in 12-hour format
  const displayHours = hours
  const displayMinutes = currentDate.getMinutes() < 10 ? '0' + currentDate.getMinutes() : currentDate.getMinutes()
  const displaySeconds = currentDate.getSeconds() < 10 ? '0' + currentDate.getSeconds() : currentDate.getSeconds()
  const meridiem = currentDate.getHours() >= 12 ? 'PM' : 'AM'

//   displayTime.textContent = displayHours + ':' + displayMinutes + ':' + displaySeconds + ' ' + meridiem
  displayTime.textContent = `${displayHours}:${displayMinutes}:${displaySeconds} ${meridiem}`
}

function setRotation(element, rotationRatio) {
  element.style.setProperty('--rotation', rotationRatio * 360)
}

setClock()
