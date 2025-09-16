import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

// Corrected relative imports using the Laravel structure
import Layout from './components/layout/Layout';
import HomePage from './components/pages/HomePage'; 
// import CategoriesPage from './components/pages/CategoriesPage'; 

function Main() {
  return (
    <Router basename="/discount/public">
      <Routes>
        {/* All pages are wrapped by the Layout */}
        <Route path="/" element={
          <Layout>
            <HomePage />
          </Layout>
        } />
        
        {/* <Route path="/categories" element={
          <Layout>
            <CategoriesPage />
          </Layout>
        } /> */}
        
        {/* Add more routes here */}
        
      </Routes>
    </Router>
  );
}

export default Main;