// scale-reader.js
import { SerialPort, ReadlineParser } from 'serialport';

const port = new SerialPort({ path: '/dev/tnt1', baudRate: 9600 });
const parser = port.pipe(new ReadlineParser({ delimiter: '\n' }));

parser.on('data', data => {
  console.log('Received weight:', data);
});
