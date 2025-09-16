// resources/js/components/layout/Footer.jsx
import React from 'react';
import { Link } from 'react-router-dom'; // Use Link for internal navigation

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-gray-300 py-8 mt-auto">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p className="mb-3">&copy; {new Date().getFullYear()} **CouponFinder**. All rights reserved.</p>
        
        <div className="space-x-4 text-sm">
          {/* Footer Links */}
          <Link to="/privacy" className="hover:text-white transition">Privacy Policy</Link>
          <span className="text-gray-500">|</span>
          <Link to="/terms" className="hover:text-white transition">Terms of Service</Link>
          <span className="text-gray-500">|</span>
          <Link to="/contact" className="hover:text-white transition">Contact</Link>
        </div>
      </div>
    </footer>
  );
};

export default Footer;