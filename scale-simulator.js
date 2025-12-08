// scale-simulator.js
import { SerialPort } from 'serialport';

const port = new SerialPort({ path: '/dev/tnt0', baudRate: 9600 });

function sendWeight() {
  const weight = (Math.random() * 50).toFixed(2); // 0–50 kg
  const message = `ST,+${weight} kg\n`;
  port.write(message, () => {
    console.log('Sent:', message.trim());
  });
}

// Send weight every second
setInterval(sendWeight, 1000);
