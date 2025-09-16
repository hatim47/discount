// resources/js/components/layout/Header.jsx
import React from 'react';
import { Link } from 'react-router-dom'; // Use Link for internal navigation

const Header = () => {
  return (
    <header className="bg-white shadow-md sticky top-0 z-10">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        {/* Logo/Brand Name */}
        <Link to="/" className="text-3xl font-extrabold text-primary-700 hover:text-primary-600 transition">
          CouponFinder
        </Link>
        
        {/* Navigation Links */}
        <nav className="hidden md:flex space-x-6">
          <Link to="/categories" className="text-gray-600 hover:text-primary-600 transition">Categories</Link>
          <Link to="/featured" className="text-gray-600 hover:text-primary-600 transition">Featured Deals</Link>
          <Link to="/about" className="text-gray-600 hover:text-primary-600 transition">About Us</Link>
        </nav>
        
        {/* Action Button */}
        <button className="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition duration-200 shadow-md">
          Login / Sign Up
        </button>
      </div>
    </header>
  );
};

export default Header;