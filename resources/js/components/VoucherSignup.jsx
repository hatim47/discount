// resources/js/components/CouponCard.jsx
import React, { useState } from 'react';
import { Icon } from "@iconify/react";
function VoucherSignup() {
 const [email, setEmail] = useState('');

const categories = [
  {
    name: "Clothing & Accessories",
    stores: [
      "House Of CB", "Boden", "Fashion World", "Missguided UK",
      "Wallis", "JD Williams", "Simply Be UK", "Jaded London",
      "Accessorize", "Brantano", "Clarks UK", "Lily Lulu Fashion",
      "Asda George", "Surfdome", "Boohoo", "Yours Clothing",
      "Peacocks", "Pretty Little Thing", "Poux Avenue", "White Stuff",
      "Debenhams UK", "Shoespie", "Jigsaw", "Monsoon",
      "Bravissimo", "New Look", "River Island"
    ]
  },
  {
    name: "Home & Garden",
    stores: [
      "IKEA", "Wayfair", "Dunelm", "Homebase",
      "Wilko", "The Range", "B&Q", "Habitat",
      "DFS", "Cotswold Company", "Made.com", "George Home",
      "Loaf", "Oak Furnitureland", "Argos Home", "John Lewis Home",
      "Lakeland", "Dobbies Garden Centres", "Robert Dyas", "Homesense",
      "ScS", "Furniture Village", "Sofa.com", "Heal’s",
      "Leekes", "West Elm", "Crate & Barrel"
    ]
  },
  {
    name: "Health & Beauty",
    stores: [
      "Boots", "Superdrug", "Holland & Barrett", "The Body Shop",
      "Space NK", "Lookfantastic", "Feelunique", "Cult Beauty",
      "MAC Cosmetics", "Sephora", "Charlotte Tilbury", "Glossier",
      "Clinique", "Benefit Cosmetics", "Urban Decay", "Estee Lauder",
      "Origins", "Elemis", "Liz Earle", "Kiehl’s",
      "Aesop", "Neal’s Yard Remedies", "Clarins", "Lancome",
      "NARS", "Shiseido", "Molton Brown"
    ]
  },
  {
    name: "Jewelry & Watches",
    stores: [
      "Pandora", "Tiffany & Co.", "Swarovski", "H. Samuel",
      "Goldsmiths", "Ernest Jones", "Rolex", "Cartier",
      "Chopard", "Omega", "Fossil", "Michael Kors",
      "Thomas Sabo", "Links of London", "Bulgari", "Longines",
      "Tag Heuer", "Breitling", "Seiko", "Citizen",
      "Movado", "Rado", "Tissot", "Piaget",
      "Van Cleef & Arpels", "Breguet", "Jaeger-LeCoultre"
    ]
  }
];
const [activeIndex, setActiveIndex] = useState(0);
  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('Email submitted:', email);
    // Handle form submission
  };
 return (
    <div className="max-w-7xl mx-auto px-8  py-6">
      <div className="flex flex-col lg:flex-row gap-8">
        {/* Left Section - Recommended Stores */}
        <div className="flex flex-col">
          <h2 className="text-2xl w-fit font-bold text-gray-800 mb-6">Recommended Stores</h2>
          
       <div className="flex gap-6">
      {/* Left side - Categories */}
      <div className="w-5/12 space-y-2 ">
        {categories.map((category, index) => (
          <button
            key={index}
            onClick={() => setActiveIndex(index)}
            className={`w-full text-[#0F0F0F] font-semibold px-2 py-5 rounded-lg text-center transition ${
              activeIndex === index
                ? "bg-[#e6e4de]  "
                : "bg-[#F2F0E6] text-[#0F0F0F] hover:bg-[#e6e4de]"
            }`}
          >
            {category.name}
          </button>
        ))}
      </div>

      {/* Right side - Stores */}
      <div className="bg-[#F2F0E6] rounded-lg border border-gray-200 p-4">
       

        {categories[activeIndex].stores.length > 0 ? (
          <>
            <div className="grid grid-cols-2 md:grid-cols-2 gap-x-8 text-sm text-[#0F0F0F]">
              {categories[activeIndex].stores.map((store, idx) => (
                <div key={idx} className="truncate">
                  {store}
                </div>
              ))}
              <button className="text-teal-600 text-sm font-medium hover:text-teal-700 flex gap-1 items-center">
              View All
              <Icon icon="iconoir:page-right-solid" width="14" height="14" />
            </button>
            </div>
            
          </>
        ) : (
          <p className="text-sm text-gray-500">No stores available</p>
        )}
      </div>
    </div>

        </div>





        {/* Right Section - Sign-up Form */}
        <div className="w-11/12">
          <div className="bg-white rounded-lg px-4 py-8 shadow-sm border border-gray-200">
            {/* Icon */}
            <div className="flex justify-center mb-10">
              <div className="relative">
                <div className="w-12 h-12  rounded-full flex items-center justify-center transform rotate-12">
                  <svg xmlns="http://www.w3.org/2000/svg" width={400} height={400} viewBox="0 0 20 24" ><g fill="none"><path fill="#fd8087" d="M6.26 3.391L2.863 1.692a.957.957 0 0 0-1.384.856v.674a.96.96 0 0 0 .602.888l1.79.716l-.594.396a.957.957 0 0 0-.235 1.37l.541.721a.96.96 0 0 0 .766.383L6.26 7.17zm11.48 0l3.398-1.699a.957.957 0 0 1 1.384.856v.674a.96.96 0 0 1-.602.888l-1.79.716l.594.396a.957.957 0 0 1 .235 1.37l-.541.721a.96.96 0 0 1-.766.383L17.74 7.17z"></path><path fill="#ffe512" d="M16.783 1H7.216a.957.957 0 0 0-.956.957v6.695a.956.956 0 0 0 .956.957h9.565a.956.956 0 0 0 .957-.957V1.957A.957.957 0 0 0 16.782 1"></path><path fill="#ff9900" d="M7.217 1a.957.957 0 0 0-.956.957v6.695a.956.956 0 0 0 .956.957h.79L16.617 1z"></path><path stroke="#1EC27E" strokeLinecap="round" strokeLinejoin="round" d="M16.783 1H7.216a.957.957 0 0 0-.956.957v6.695a.956.956 0 0 0 .956.957h9.565a.956.956 0 0 0 .957-.957V1.957A.957.957 0 0 0 16.782 1" strokeWidth={1}></path><path stroke="#1EC27E" strokeLinecap="round" strokeLinejoin="round" d="m6.583 1.241l4.843 3.633a.96.96 0 0 0 1.148 0l4.844-3.635M12 14.391V23M9.13 12.478v6.696m5.74-6.696v6.696m2.87-15.783l3.398-1.699a.957.957 0 0 1 1.384.856v.674a.96.96 0 0 1-.602.888l-1.79.716l.594.396a.957.957 0 0 1 .235 1.37l-.541.721a.96.96 0 0 1-.766.383M6.26 3.391L2.863 1.692a.957.957 0 0 0-1.384.856v.674a.96.96 0 0 0 .602.888l1.79.716l-.594.396a.957.957 0 0 0-.235 1.37l.541.721a.96.96 0 0 0 .766.383" strokeWidth={1}></path></g></svg>
                </div>
                <div className="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                  <span className="text-white text-xs font-bold">1</span>
                </div>
              </div>
            </div>
            <div className="flex flex-col justify-center gap-6 mb-4">
            <h3 className="text-3xl font-bold text-gray-800 text-center ">
              Sign-up To Get Latest Voucher Codes First
            </h3>
            
            <p className="text-gray-600  text-center ">
              Be the first one to get notified as soon as we update a new offer or discount.
            </p>

            <form onSubmit={handleSubmit} className="space-y-4 relative">
              <div className="flex gap-2">
                <input
                  type="email"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  placeholder="Enter Your Email Address Here"
                  className="flex-1 px-3  py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent"
                  required
                />
                <button
                  type="submit"
                  className="px-3 py-2 sm:px-6 sm:py-3 absolute bg-red-500 hover:bg-red-600 text-white font-semibold rounded-full text-sm right-0 transition-colors"
                >
                  Subscribe
                </button>
              </div>
            </form>

            <p className="text-xs text-gray-500 text-center  leading-relaxed">
              By signing up I agree to topvoucherscode's{' '}
              <a href="#" className="text-red-500 hover:text-red-600 underline">
                Privacy Policy
              </a>{' '}
              and consent to receive emails about offers.
            </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default VoucherSignup;