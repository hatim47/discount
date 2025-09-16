// resources/js/components/CouponCard.jsx
import React from 'react';

const CouponCard = ({ store, discount, category, code }) => (
  <div className="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
    <div className="flex justify-between items-start">
      <h3 className="text-2xl font-bold text-primary-600">{discount}</h3>
      <span className="text-sm font-medium text-gray-500 bg-primary-100 px-3 py-1 rounded-full">{category}</span>
    </div>
    <p className="mt-2 text-gray-600">at <strong className="text-gray-800">{store}</strong></p>
    
    <div className="mt-4 pt-4 border-t border-dashed border-gray-200">
      <div className="flex items-center justify-between bg-gray-100 p-3 rounded-lg">
        <span className="text-xl font-mono tracking-wider text-gray-900">{code}</span>
        <button className="text-sm bg-primary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition duration-150">
          Copy
        </button>
      </div>
    </div>
  </div>
);

export default CouponCard;