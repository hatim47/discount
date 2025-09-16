import './bootstrap';
import ReactDOM from 'react-dom/client';
import App from './Main'; // Your main React component

if (document.getElementById('root')) {
    ReactDOM.createRoot(document.getElementById('root')).render(
        <App  />
    );
}