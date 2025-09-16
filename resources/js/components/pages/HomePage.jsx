// resources/js/components/pages/HomePage.jsx
import React from 'react';
import CouponCard from '../CouponCard'; // Assuming the card component is here

// Mock data (replace with API calls later)
const featuredCoupons = [
  { id: 1, store: "TechZone", discount: "50% OFF", category: "Electronics", code: "REACT50" },
  { id: 2, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
];

const HomePage = () => {
  return (
    <>
      {/* Hero Section */}
      <section className="bg-primary-700 text-white py-16">
        <div className="max-w-4xl mx-auto text-center px-4">
          <h1 className="text-5xl font-extrabold mb-4">Find the Best Deals Today</h1>
          <p className="text-xl opacity-80 mb-8">Exclusive coupons updated daily.</p>
        </div>
      </section>

      {/* Featured Coupons Grid */}
      <section className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h2 className="text-3xl font-bold text-gray-800 mb-8 border-b-2 border-primary-500 pb-2 inline-block">Featured Coupons</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {featuredCoupons.map(coupon => (
            <CouponCard key={coupon.id} {...coupon} />
          ))}
        </div>
      </section>
    </>
  );
};

export default HomePage;