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
      <section className="bg-[#FAF9F5] text-[#0F0F0F] py-16 ">
        <div className="max-w-4xl mx-auto text-center px-4">
          <h1 className="text-5xl font-bold mb-4 capitalize">Tired of searching for discounts online?</h1>
          <p className="text-xl mb-8">Exclusive Coupons Updated Daily.</p>
        </div>
 <div className="max-w-4xl mx-auto text-center px-4">
    <input type="text" className='h-14 w-full px-4 rounded-full border-2 border-[#1EC27E] bg-white' />
    <div className="bg-[#1EC27E]"> </div>
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