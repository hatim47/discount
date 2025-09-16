// resources/js/components/layout/Layout.jsx
import React from 'react';
import Header from './Header'; // Correct relative import
import Footer from './Footer'; // Correct relative import

const Layout = ({ children }) => {
  return (
    <div className="min-h-screen flex flex-col bg-gray-50">
      <Header />
      
      {/* Main content area wrapped */}
      <main className="flex-grow">
        {children}
      </main>
      
      <Footer />
    </div>
  );
};

export default Layout;