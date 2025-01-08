import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';

// Import your components
import About from './Pages/About';
import Text from './Pages/Text';
import Profile from './Pages/Profile';
import Favorit from './Pages/Favorit';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });
    return pages[`./Pages/${name}.jsx`];
  },
  setup({ el, App, props }) {
    createRoot(el).render(
      <BrowserRouter>
        <Routes>
          {/* Define your routes */}
          <Route path="/" element={<Text />} /> {/* Default page */}
          <Route path="/about" element={<About />} /> {/* About page */}
          <Route path='/profile' element={<Profile />}/>
          <Route path='/Favorit' element={<Favorit />}/>
          {/* Inertia as a fallback or additional route */}
          <Route path="/inertia" element={<App {...props} />} />
        </Routes>
      </BrowserRouter>
    );
  },
});
