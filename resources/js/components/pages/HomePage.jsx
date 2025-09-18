// resources/js/components/pages/HomePage.jsx
import React,{ useRef,useEffect, useState } from 'react';
import { motion } from "framer-motion";
import CouponCard from '../CouponCard';
import VoucherSignup from '../VoucherSignup';
import { Icon } from "@iconify/react";
const stores = [
  { name: "Juicy Couture", logo: "https://picsum.photos/400/400?random=2" },
  { name: "Boudsdx Avenue", logo: "https://picsum.photos/400/400?random=3" },
  { name: "Jasdsded London", logo: "https://picsum.photos/400/400?random=1" },
  { name: "BSIsadsa Knowledge", logo: "https://picsum.photos/400/400?random=4" },
  { name: "Posadsaoky", logo: "https://picsum.photos/400/400?random=1" },
  { name: "Lulsadus", logo: "https://picsum.photos/400/400?random=4" },
  { name: "Sasadltrock", logo: "https://picsum.photos/400/400?random=6" },
  { name: "Mosadda in Pelle", logo: "https://picsum.photos/400/400?random=8" },
   { name: "Jusadicy Couture", logo: "https://picsum.photos/400/400?random=2" },
  { name: "Bosaux Avenue", logo: "https://picsum.photos/400/400?random=5" },
  { name: "Jasdsaded London", logo: "https://picsum.photos/400/400?random=4" },
  { name: "sadBSI Knowledge", logo: "https://picsum.photos/400/400?random=2" },
  { name: "Posadoky", logo: "https://picsum.photos/400/400?random=7" },
  { name: "Luasdlus", logo: "https://picsum.photos/400/400?random=8" },
  { name: "Salsadtrock", logo: "https://picsum.photos/400/400?random=4" },
  { name: "Mosadda in Pelle", logo: "https://picsum.photos/400/400?random=6" }, { name: "Juicy Couture", logo: "https://picsum.photos/400/400?random=5" },
  { name: "Bosadux Avenue", logo: "https://picsum.photos/400/400?random=7" },
  { name: "Mosadda in Pelle", logo: "https://picsum.photos/400/400?random=8" },
   { name: "Judicy Couture", logo: "https://picsum.photos/400/400?random=2" },
  { name: "Bdsoux Avenue", logo: "https://picsum.photos/400/400?random=5" },
  { name: "Jasaded London", logo: "https://picsum.photos/400/400?random=4" },
  { name: "BSdsaI Knowledge", logo: "https://picsum.photos/400/400?random=2" },
  { name: "Poosdky", logo: "https://picsum.photos/400/400?random=7" },
  { name: "Luldsadus", logo: "https://picsum.photos/400/400?random=8" },
  { name: "Salsatrock", logo: "https://picsum.photos/400/400?random=4" },
  { name: "Modsada in Pelle", logo: "https://picsum.photos/400/400?random=6" }, { name: "Juicy Couture", logo: "https://picsum.photos/400/400?random=5" },
  { name: "Bosaux Avenue", logo: "https://picsum.photos/400/400?random=7" },
];



const featuredCoupons = [
  { id: 1, store: "TechZone", discount: "50% OFF", category: "Electronics", code: "REACT50" },
  { id: 2, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 24, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 42, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 52, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 424, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 332, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
  { id: 252, store: "FashionHub", discount: "$20 OFF", category: "Apparel", code: "STYLES20" },
];
const deals = [
  {
    id: 1,
    brand: "Cupshe",
    logo: "https://picsum.photos/40/40?random=1",
    image: "https://picsum.photos/600/360?random=101",
    title: "Free UK Delivery On All Orders at Cupshe",
    used: "1K Used",
    cta: "Get Deal",
    link: "#",
  },
  {
    id: 2,
    brand: "GymShark",
    logo: "https://picsum.photos/40/40?random=2",
    image: "https://picsum.photos/600/360?random=102",
    title: "10% Off Sitewide at GymShark",
    used: "7.8K Used",
    cta: "Reveal Code",
    link: "#",
  },
  {
    id: 3,
    brand: "Juicy Couture",
    logo: "https://picsum.photos/400/400?random=3",
    image: "https://picsum.photos/600/360?random=103",
    title: "10% Off Sitewide at Juicy Couture",
    used: "31 Used",
    cta: "Reveal Code",
    link: "#",
  },
  {
    id: 4,
    brand: "Boden",
    logo: "https://picsum.photos/40/40?random=4",
    image: "https://picsum.photos/600/360?random=104",
    title: "Free Delivery On Orders Over £50+ at Boden",
    used: "1.6K Used",
    cta: "Get Deal",
    link: "#",
  },
    {
    id: 5,
    brand: "Boden",
    logo: "https://picsum.photos/40/40?random=4",
    image: "https://picsum.photos/600/360?random=104",
    title: "Free Delivery On Orders Over £50+ at Boden",
    used: "1.6K Used",
    cta: "Get Deal",
    link: "#",
  },
];
const DealCard = ({ deal }) => {
  return (
    <article className="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div className="relative">
  <img
    src={deal.image}
    alt={`${deal.brand} offer`}

    loading="lazy"
    className="w-full h-40 object-cover"
  />
  <img
    src={deal.logo}
    alt={`${deal.brand} logo`}
  
    loading="lazy"
    className="w-14 h-14 rounded-full absolute -bottom-5 left-4 border-2 border-white shadow-md"
  />
</div>

<div className="p-4 pt-8 flex flex-col justify-between h-[220px]">
  <h2 className="text-gray-900 font-semibold text-sm">{deal.brand}</h2>
  <h3 className="text-gray-800 font-bold text-base mb-2">{deal.title}</h3>
  <p className="text-xs text-gray-500">View Terms · {deal.used}</p>
  {/* <a
    href={deal.link}
    className="mt-3 inline-block text-center bg-green-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-[#1EC27E] transition-colors duration-300"
  >
    {deal.cta}
  </a> */}
<br />
     
      {/* Left button with diagonal cut */}
      
        <button
      aria-label="Reveal Code"
      data-code="d92b1abaa0"
      data-text=" Reveal Code"
      className="
        relative z-10 overflow-hidden 
        inline-flex items-center justify-center 
        w-full px-6 py-2 rounded-lg font-light text-white 
        bg-[#1EC27E] shadow-md 
        before:content-[attr(data-code)] before:inline-flex 
        before:absolute before:top-0 before:right-0 before:h-full before:w-16 
        before:items-center before:justify-end before:pr-3
        before:border-2 before:border-dashed before:border-l-0 before:border-[#1EC27E]
        before:rounded-r-lg before:bg-[#F2F0E6] before:text-[#0F0F0F] before:uppercase before:text-sm 
         before:-z-1 after:content-[''] after:absolute after:top-0 after:right-[34px] after:h-[calc(100%+2px)] after:w-full
        after:bg-[#1EC27E] after: after:transition-all after:duration-200 after:ease-in-out  after:-z-1
        font-normal text-base  after:skew-x-[25deg] hover:after:right-[45px] hover:after:shadow-[5px_0_5px_0_rgba(0,0,0,0.25)]
      "
    > 
      Reveal Code
    </button>
           

     
      
    
</div>
    </article>
  );
};


const HomePage = () => {

  const containerRef = useRef(null);
  const [activePage, setActivePage] = useState(0);

  const visibleCount = 4; // logos visible at once
  const totalPages = Math.ceil(stores.length / visibleCount);

  // Track scroll to update dots
  const handleDrag = () => {
    if (!containerRef.current) return;
    const scrollLeft = containerRef.current.scrollLeft;
    const pageWidth = containerRef.current.offsetWidth;
    const page = Math.round(scrollLeft / pageWidth);
    setActivePage(page);
  };

  return (
    <>
      {/* Hero Section */}
      <section className="bg-[#FAF9F5] text-[#0F0F0F] py-16 ">
        <div className="max-w-4xl mx-auto text-center px-4">
          <h1 className="text-5xl font-bold mb-4 capitalize">Tired of searching for discounts online?</h1>
          <p className="text-xl mb-8">Exclusive Coupons Updated Daily.</p>
        </div>
 <div className="max-w-4xl  mx-auto text-center px-4 relative">
    <input type="text" className='h-14 w-full px-4 rounded-full border-2 relative border-[#1EC27E] bg-white' />
    <div className="bg-[#1EC27E] w-15 h-15 rounded-full absolute flex justify-center items-center text-white font-bold -top-[2px] right-4"><Icon icon="fluent:search-12-filled" width="34" height="34" /></div>
 </div>

      </section>

      {/* Featured Coupons Grid */}
      <section className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
        <h2 className="text-3xl font-bold text-[#0F0F0F] mb-8  pb-2 ">Featured Discount Voucher Offers</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {featuredCoupons.map(coupon => (
            <CouponCard key={coupon.id} {...coupon} />
          ))}
        </div>
      </section>

 <section className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
        <h2 className="text-3xl font-bold text-[#0F0F0F] mb-8  pb-2 ">Featured Store</h2>
       
  <div className="flex flex-col items-center justify-center gap-4 overflow-hidden">
  <motion.div
    ref={containerRef}
    className="flex gap-4  cursor-grab py-6 px-4"
    drag="x"
    dragConstraints={{ left: -1000, right: 0 }}
    dragElastic={0.2}
    onDrag={handleDrag}
  >
    {stores.map((store, idx) => (
      <motion.div
        key={idx}
        className="
          flex-shrink-0 
          rounded-full border flex items-center justify-center 
          select-none overflow-hidden
          w-1/3 sm:w-1/4 md:w-1/6 lg:w-1/8
          
        "
        whileTap={{ scale: 0.95 }}
        whileHover={{ scale: 1.05 }}
      >
        <img
          src={store.logo}
          alt={store.name}
          draggable="false"
          className=" select-none pointer-events-none max-w-full max-h-full "
        />
      </motion.div>
    ))}
  </motion.div>
</div>

       
      </section> 
<section className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center">
 <div className="sm:grid sm:grid-cols-5 gap-5 flex flex-col items-center justify-center ">
<div className="flex flex-col items-center justify-center gap-4 rounded-xl p-6 shadow-[0_0_5px_3px_rgba(0,0,0,0.07)]">
  <svg xmlns="http://www.w3.org/2000/svg" width="100.943" height="100.934" viewBox="0 0 100.943 100.934"><g transform="translate(-2476.113 -223.174)"><path d="M2494.977,360.539l90.169-.138.414,67.661-4.971,5.109-87.545-.69-4.142-3.452,6.075-7.457Z" transform="translate(-10.262 -110.12)" fill="#fff"/><path d="M2485.683,670.071h85.75v8.837l3.59,1.243-86.3.552-3.314-4.143Z" transform="translate(-7.458 -358.618)" fill="#c6eaff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2496.728 264.366)" fill="#a3dcff"/><circle cx="14.531" cy="14.531" r="14.531" transform="translate(2478.884 282.699)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2515.162 264.573)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2533.389 264.504)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2551.986 264.575)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2552.077 285.116)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2533.16 285.116)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2515.209 284.978)" fill="#a3dcff"/><path d="M2523.007,279.133l6.49-3.314,75.946.69,5.109,2.071,2.071,13.808h-90.168Z" transform="translate(-37.188 -42.246)" fill="#b9f07d"/><rect width="5.42" height="15.638" transform="translate(2504.495 225.495)" fill="#fff"/><rect width="5.42" height="15.638" transform="translate(2549.096 226.047)" fill="#fff"/><g transform="translate(2476.113 223.174)"><path d="M2476.113,311.1a2.438,2.438,0,0,1,2.657-1.573c1.439.041,2.88.01,4.575.01-3.778-3.614-5.727-7.827-5.506-12.9a15.543,15.543,0,0,1,6.41-12.218,16.16,16.16,0,0,1,21.16,1.464,16.441,16.441,0,0,1-.758,23.657h18.7a4.367,4.367,0,0,1,1.366.129,1.924,1.924,0,0,1-.208,3.759,7.881,7.881,0,0,1-1.277.054q-21,0-41.991-.025c-1.034,0-1.316.29-1.2,1.252.076.648,0,1.314.024,1.969a3.546,3.546,0,0,0,3.454,3.486c.295.016.591.009.887.009h77.279c.263,0,.525-.006.788,0,.3,0,.453-.095.3-.406a10.754,10.754,0,0,1-.682-5.314c.022-.764-.179-.99-.969-.986-6.407.034-12.814.02-19.221.017a6.849,6.849,0,0,1-1.082-.044,1.9,1.9,0,0,1-1.64-1.817,1.835,1.835,0,0,1,1.453-1.953,4.754,4.754,0,0,1,1.167-.122q10.745-.01,21.488,0c2.068,0,2.725.655,2.729,2.706,0,1.38-.011,2.76,0,4.14a3.553,3.553,0,1,0,7.089-.035q.015-15.475,0-30.951,0-21.439,0-42.878c0-4.381-2.365-6.73-6.772-6.731-2.563,0-5.126.024-7.688-.016-.694-.011-.913.194-.877.884.1,1.965-.013,3.891-1.446,5.455a5.639,5.639,0,0,1-6.066,1.774,5.515,5.515,0,0,1-4.182-4.828,16.084,16.084,0,0,1-.113-2.554c.008-.553-.163-.787-.726-.721a6.761,6.761,0,0,1-.788,0c-10.186,0-20.371.012-30.557-.021-.873,0-1.138.215-1.08,1.087a6.934,6.934,0,0,1-1.126,4.877,5.921,5.921,0,0,1-10.68-3.55c-.008-.131,0-.263-.006-.394-.027-2-.027-2-1.978-2-2.037,0-4.074-.016-6.111,0a5.912,5.912,0,0,0-6.174,6.124c-.025,1.872.009,3.746-.014,5.618-.006.5.123.742.658.679a6.764,6.764,0,0,1,.788,0h68.6a9.036,9.036,0,0,1,1.181.031,1.949,1.949,0,0,1-.031,3.884,8.741,8.741,0,0,1-1.083.025q-34.451,0-68.9-.023c-.985,0-1.241.221-1.234,1.223.049,7.031.028,14.062.021,21.094a5.635,5.635,0,0,1-.117,1.267,1.821,1.821,0,0,1-2.007,1.5,1.906,1.906,0,0,1-1.79-1.778,7.056,7.056,0,0,1-.024-.788q0-16.264,0-32.528a9.729,9.729,0,0,1,5.566-9.245,9.165,9.165,0,0,1,4.267-1.025c2.464,0,4.93-.046,7.392.024.871.025,1.05-.263,1-1.047a13.6,13.6,0,0,1,.083-2.358,5.866,5.866,0,0,1,11.7.355,16.8,16.8,0,0,1,.019,2.167c-.051.7.209.879.888.874,3.778-.03,7.557-.015,11.335-.015,6.637,0,13.274-.016,19.911.021.84,0,1.054-.235,1.016-1.042-.095-1.99.02-3.938,1.435-5.567a5.877,5.877,0,0,1,6.342-1.746,5.775,5.775,0,0,1,3.991,5.112,22.757,22.757,0,0,1,.034,2.462c-.028.614.194.778.789.772,2.759-.027,5.52-.018,8.28-.011a9.918,9.918,0,0,1,10.21,10.2q.011,37.013,0,74.026c0,4.192-2.206,6.967-6.247,7.909a1.176,1.176,0,0,0-.257.132h-87.93a10.931,10.931,0,0,1-3.477-1.5,8.4,8.4,0,0,1-3.029-5.005Zm30.041-13.765a12.21,12.21,0,1,0-12.238,12.185A12.222,12.222,0,0,0,2506.154,297.331Zm2.736-63.716c0-1.412.018-2.825,0-4.237-.023-1.38-.8-2.256-1.951-2.255a2,2,0,0,0-1.967,2.155q-.067,4.384,0,8.769a1.934,1.934,0,0,0,2.06,2.127c1.136-.048,1.835-.86,1.856-2.224C2508.908,236.505,2508.89,235.06,2508.89,233.615Zm44.951.017c0-1.412.017-2.825,0-4.237-.022-1.388-.785-2.262-1.935-2.272a2.026,2.026,0,0,0-1.988,2.238c-.036,2.89-.041,5.781,0,8.671a1.943,1.943,0,0,0,2.045,2.146c1.136-.04,1.85-.856,1.873-2.21C2553.859,236.522,2553.84,235.076,2553.841,233.631Z" transform="translate(-2476.113 -223.174)"/><path d="M2757.283,430.242a7.469,7.469,0,1,1,7.424,7.5A7.516,7.516,0,0,1,2757.283,430.242Zm3.943.057a3.526,3.526,0,1,0,3.529-3.585A3.54,3.54,0,0,0,2761.226,430.3Z" transform="translate(-2701.741 -383.343)"/><path d="M2772.3,534.385a7.452,7.452,0,1,1-7.1-7.792A7.477,7.477,0,0,1,2772.3,534.385Zm-3.921-.459a3.524,3.524,0,1,0-3.34,3.672A3.545,3.545,0,0,0,2768.381,533.927Z" transform="translate(-2701.851 -466.644)"/><path d="M2570.918,430.131a7.483,7.483,0,1,1,7.32,7.612A7.537,7.537,0,0,1,2570.918,430.131Zm7.457-3.41a3.541,3.541,0,1,0,3.564,3.573A3.553,3.553,0,0,0,2578.375,426.721Z" transform="translate(-2552.189 -383.348)"/><path d="M2850.37,430.261a7.483,7.483,0,1,1,7.448,7.49A7.542,7.542,0,0,1,2850.37,430.261Zm7.476-3.536a3.541,3.541,0,1,0,3.547,3.59A3.552,3.552,0,0,0,2857.846,426.725Z" transform="translate(-2776.44 -383.352)"/><path d="M2857.8,526.577a7.485,7.485,0,1,1-7.428,7.51A7.564,7.564,0,0,1,2857.8,526.577Zm.04,11.026a3.541,3.541,0,1,0-3.525-3.6A3.582,3.582,0,0,0,2857.838,537.6Z" transform="translate(-2776.44 -466.644)"/><path d="M2678.947,430.226a7.478,7.478,0,1,1-7.483-7.444A7.519,7.519,0,0,1,2678.947,430.226Zm-3.943.061a3.53,3.53,0,0,0-3.55-3.562,3.542,3.542,0,1,0,.057,7.084A3.531,3.531,0,0,0,2675,430.287Z" transform="translate(-2626.878 -383.352)"/><path d="M2678.946,534.076a7.478,7.478,0,1,1-7.424-7.5A7.519,7.519,0,0,1,2678.946,534.076Zm-3.943.049a3.533,3.533,0,0,0-3.5-3.61,3.542,3.542,0,1,0-.037,7.084A3.53,3.53,0,0,0,2675,534.125Z" transform="translate(-2626.876 -466.639)"/><path d="M2930.449,351.925a1.981,1.981,0,0,1-1.942,1.951,1.956,1.956,0,0,1,.01-3.913A1.981,1.981,0,0,1,2930.449,351.925Z" transform="translate(-2837.578 -324.917)"/><path d="M2757.374,662.4a1.968,1.968,0,0,1,1.932-1.955,2,2,0,0,1,1.935,1.968,1.976,1.976,0,0,1-1.947,1.944A1.937,1.937,0,0,1,2757.374,662.4Z" transform="translate(-2701.815 -574.07)"/><path d="M2542.621,573.2a2.337,2.337,0,0,1-.76,1.642c-2.479,2.483-4.948,4.976-7.448,7.437a1.988,1.988,0,0,1-3.12.017q-1.674-1.593-3.269-3.269a1.976,1.976,0,1,1,2.747-2.825c.074.064.14.138.211.206.613.59,1.206,1.624,1.844,1.652.731.033,1.283-1.062,1.907-1.672,1.453-1.422,2.865-2.886,4.323-4.3,1.13-1.1,2.546-1,3.265.178A2.09,2.09,0,0,1,2542.621,573.2Z" transform="translate(-2517.196 -502.549)"/></g></g><script xmlns=""/></svg>
<span className='text-5xl text-red-500 font-semibold '>410</span>
<p className='text-[#0F0F0F] text-xl font-bold'>Offers added this week</p>

</div>
<div className="flex flex-col items-center justify-center gap-4 rounded-xl p-6 shadow-[0_0_5px_3px_rgba(0,0,0,0.07)] ">
   <svg xmlns="http://www.w3.org/2000/svg" width="100.943" height="100.934" viewBox="0 0 100.943 100.934"><g transform="translate(-2476.113 -223.174)"><path d="M2494.977,360.539l90.169-.138.414,67.661-4.971,5.109-87.545-.69-4.142-3.452,6.075-7.457Z" transform="translate(-10.262 -110.12)" fill="#fff"/><path d="M2485.683,670.071h85.75v8.837l3.59,1.243-86.3.552-3.314-4.143Z" transform="translate(-7.458 -358.618)" fill="#c6eaff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2496.728 264.366)" fill="#a3dcff"/><circle cx="14.531" cy="14.531" r="14.531" transform="translate(2478.884 282.699)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2515.162 264.573)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2533.389 264.504)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2551.986 264.575)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2552.077 285.116)" fill="#ff655f"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2533.16 285.116)" fill="#a3dcff"/><circle cx="5.523" cy="5.523" r="5.523" transform="translate(2515.209 284.978)" fill="#a3dcff"/><path d="M2523.007,279.133l6.49-3.314,75.946.69,5.109,2.071,2.071,13.808h-90.168Z" transform="translate(-37.188 -42.246)" fill="#b9f07d"/><rect width="5.42" height="15.638" transform="translate(2504.495 225.495)" fill="#fff"/><rect width="5.42" height="15.638" transform="translate(2549.096 226.047)" fill="#fff"/><g transform="translate(2476.113 223.174)"><path d="M2476.113,311.1a2.438,2.438,0,0,1,2.657-1.573c1.439.041,2.88.01,4.575.01-3.778-3.614-5.727-7.827-5.506-12.9a15.543,15.543,0,0,1,6.41-12.218,16.16,16.16,0,0,1,21.16,1.464,16.441,16.441,0,0,1-.758,23.657h18.7a4.367,4.367,0,0,1,1.366.129,1.924,1.924,0,0,1-.208,3.759,7.881,7.881,0,0,1-1.277.054q-21,0-41.991-.025c-1.034,0-1.316.29-1.2,1.252.076.648,0,1.314.024,1.969a3.546,3.546,0,0,0,3.454,3.486c.295.016.591.009.887.009h77.279c.263,0,.525-.006.788,0,.3,0,.453-.095.3-.406a10.754,10.754,0,0,1-.682-5.314c.022-.764-.179-.99-.969-.986-6.407.034-12.814.02-19.221.017a6.849,6.849,0,0,1-1.082-.044,1.9,1.9,0,0,1-1.64-1.817,1.835,1.835,0,0,1,1.453-1.953,4.754,4.754,0,0,1,1.167-.122q10.745-.01,21.488,0c2.068,0,2.725.655,2.729,2.706,0,1.38-.011,2.76,0,4.14a3.553,3.553,0,1,0,7.089-.035q.015-15.475,0-30.951,0-21.439,0-42.878c0-4.381-2.365-6.73-6.772-6.731-2.563,0-5.126.024-7.688-.016-.694-.011-.913.194-.877.884.1,1.965-.013,3.891-1.446,5.455a5.639,5.639,0,0,1-6.066,1.774,5.515,5.515,0,0,1-4.182-4.828,16.084,16.084,0,0,1-.113-2.554c.008-.553-.163-.787-.726-.721a6.761,6.761,0,0,1-.788,0c-10.186,0-20.371.012-30.557-.021-.873,0-1.138.215-1.08,1.087a6.934,6.934,0,0,1-1.126,4.877,5.921,5.921,0,0,1-10.68-3.55c-.008-.131,0-.263-.006-.394-.027-2-.027-2-1.978-2-2.037,0-4.074-.016-6.111,0a5.912,5.912,0,0,0-6.174,6.124c-.025,1.872.009,3.746-.014,5.618-.006.5.123.742.658.679a6.764,6.764,0,0,1,.788,0h68.6a9.036,9.036,0,0,1,1.181.031,1.949,1.949,0,0,1-.031,3.884,8.741,8.741,0,0,1-1.083.025q-34.451,0-68.9-.023c-.985,0-1.241.221-1.234,1.223.049,7.031.028,14.062.021,21.094a5.635,5.635,0,0,1-.117,1.267,1.821,1.821,0,0,1-2.007,1.5,1.906,1.906,0,0,1-1.79-1.778,7.056,7.056,0,0,1-.024-.788q0-16.264,0-32.528a9.729,9.729,0,0,1,5.566-9.245,9.165,9.165,0,0,1,4.267-1.025c2.464,0,4.93-.046,7.392.024.871.025,1.05-.263,1-1.047a13.6,13.6,0,0,1,.083-2.358,5.866,5.866,0,0,1,11.7.355,16.8,16.8,0,0,1,.019,2.167c-.051.7.209.879.888.874,3.778-.03,7.557-.015,11.335-.015,6.637,0,13.274-.016,19.911.021.84,0,1.054-.235,1.016-1.042-.095-1.99.02-3.938,1.435-5.567a5.877,5.877,0,0,1,6.342-1.746,5.775,5.775,0,0,1,3.991,5.112,22.757,22.757,0,0,1,.034,2.462c-.028.614.194.778.789.772,2.759-.027,5.52-.018,8.28-.011a9.918,9.918,0,0,1,10.21,10.2q.011,37.013,0,74.026c0,4.192-2.206,6.967-6.247,7.909a1.176,1.176,0,0,0-.257.132h-87.93a10.931,10.931,0,0,1-3.477-1.5,8.4,8.4,0,0,1-3.029-5.005Zm30.041-13.765a12.21,12.21,0,1,0-12.238,12.185A12.222,12.222,0,0,0,2506.154,297.331Zm2.736-63.716c0-1.412.018-2.825,0-4.237-.023-1.38-.8-2.256-1.951-2.255a2,2,0,0,0-1.967,2.155q-.067,4.384,0,8.769a1.934,1.934,0,0,0,2.06,2.127c1.136-.048,1.835-.86,1.856-2.224C2508.908,236.505,2508.89,235.06,2508.89,233.615Zm44.951.017c0-1.412.017-2.825,0-4.237-.022-1.388-.785-2.262-1.935-2.272a2.026,2.026,0,0,0-1.988,2.238c-.036,2.89-.041,5.781,0,8.671a1.943,1.943,0,0,0,2.045,2.146c1.136-.04,1.85-.856,1.873-2.21C2553.859,236.522,2553.84,235.076,2553.841,233.631Z" transform="translate(-2476.113 -223.174)"/><path d="M2757.283,430.242a7.469,7.469,0,1,1,7.424,7.5A7.516,7.516,0,0,1,2757.283,430.242Zm3.943.057a3.526,3.526,0,1,0,3.529-3.585A3.54,3.54,0,0,0,2761.226,430.3Z" transform="translate(-2701.741 -383.343)"/><path d="M2772.3,534.385a7.452,7.452,0,1,1-7.1-7.792A7.477,7.477,0,0,1,2772.3,534.385Zm-3.921-.459a3.524,3.524,0,1,0-3.34,3.672A3.545,3.545,0,0,0,2768.381,533.927Z" transform="translate(-2701.851 -466.644)"/><path d="M2570.918,430.131a7.483,7.483,0,1,1,7.32,7.612A7.537,7.537,0,0,1,2570.918,430.131Zm7.457-3.41a3.541,3.541,0,1,0,3.564,3.573A3.553,3.553,0,0,0,2578.375,426.721Z" transform="translate(-2552.189 -383.348)"/><path d="M2850.37,430.261a7.483,7.483,0,1,1,7.448,7.49A7.542,7.542,0,0,1,2850.37,430.261Zm7.476-3.536a3.541,3.541,0,1,0,3.547,3.59A3.552,3.552,0,0,0,2857.846,426.725Z" transform="translate(-2776.44 -383.352)"/><path d="M2857.8,526.577a7.485,7.485,0,1,1-7.428,7.51A7.564,7.564,0,0,1,2857.8,526.577Zm.04,11.026a3.541,3.541,0,1,0-3.525-3.6A3.582,3.582,0,0,0,2857.838,537.6Z" transform="translate(-2776.44 -466.644)"/><path d="M2678.947,430.226a7.478,7.478,0,1,1-7.483-7.444A7.519,7.519,0,0,1,2678.947,430.226Zm-3.943.061a3.53,3.53,0,0,0-3.55-3.562,3.542,3.542,0,1,0,.057,7.084A3.531,3.531,0,0,0,2675,430.287Z" transform="translate(-2626.878 -383.352)"/><path d="M2678.946,534.076a7.478,7.478,0,1,1-7.424-7.5A7.519,7.519,0,0,1,2678.946,534.076Zm-3.943.049a3.533,3.533,0,0,0-3.5-3.61,3.542,3.542,0,1,0-.037,7.084A3.53,3.53,0,0,0,2675,534.125Z" transform="translate(-2626.876 -466.639)"/><path d="M2930.449,351.925a1.981,1.981,0,0,1-1.942,1.951,1.956,1.956,0,0,1,.01-3.913A1.981,1.981,0,0,1,2930.449,351.925Z" transform="translate(-2837.578 -324.917)"/><path d="M2757.374,662.4a1.968,1.968,0,0,1,1.932-1.955,2,2,0,0,1,1.935,1.968,1.976,1.976,0,0,1-1.947,1.944A1.937,1.937,0,0,1,2757.374,662.4Z" transform="translate(-2701.815 -574.07)"/><path d="M2542.621,573.2a2.337,2.337,0,0,1-.76,1.642c-2.479,2.483-4.948,4.976-7.448,7.437a1.988,1.988,0,0,1-3.12.017q-1.674-1.593-3.269-3.269a1.976,1.976,0,1,1,2.747-2.825c.074.064.14.138.211.206.613.59,1.206,1.624,1.844,1.652.731.033,1.283-1.062,1.907-1.672,1.453-1.422,2.865-2.886,4.323-4.3,1.13-1.1,2.546-1,3.265.178A2.09,2.09,0,0,1,2542.621,573.2Z" transform="translate(-2517.196 -502.549)"/></g></g><script xmlns=""/></svg>
<span className='text-5xl text-red-500 font-semibold '>410</span>
<p className='text-[#0F0F0F] text-xl font-bold'>Offers added this week</p>

</div>
<div className="col-start-3 col-end-6 flex flex-col   gap-4 rounded-xl p-5 shadow-[0_0_5px_3px_rgba(0,0,0,0.07)]">
  <div className='flex items-start' > <h4 className='font-bold text-2xl  text-[#0F0F0F]'>About Top Vouchers Code</h4></div>
<div className='h-50 overflow-auto'>
  <p className=''> <b>Top Vouchers Code contains affiliate links to products. We may receive a commission for purchases made through these links.</b>
  <br />

For most of us, going out to a crowded shopping mall to buy anything is too much of a hassle. You have to waste an entire day, miss work, and then the aggravation of finding a car parking adds up to the troubles. This is where useful websites like TopVouchersCode come in. Here, you can shop for all that you want at steep discounts from the comfort of your home. Use this super-simple yet unique platform to avail great deals on your favourite products & services 24/7. 

TVC is a critically acclaimed online deals’ provider for top-notch brands such as , , , , , , , , , , etc. Offering authentic, reliable and fresh deals for over 10,000 brands on our portal, we are the front-line leaders of online deals in the UK and beyond. These deals grow more significant as the events such as  start approaching letting you buy at huge concessions from your favourite online retail stores. No matter what you want a discount on, TVC aims to have it all. All you need to do is to go to our portal and choose from the diverse range of brands available.
For your convenience, there are many ways to shop at TVC. One of them is finding offers through categories’ pages available on our home page. While you browse them, you can also check out our  Promo Codes on those pages. The categories at TVC consist of Clothing & Accessories, Travel, Home & Garden, Baby & Kids, Flowers & Gifts, Jewellery & Watches, Sports & Outdoors, Department Store, and Electronics. It also counts in office supplies, food & beverages, health & beauty, entertainment, pet, books & magazines, telecommunications, games & toys, photography, computers & software, education, finance & insurance, internet service, and automotive. Click on a category, and you will be able to see many related retail stores which you can pick from.
We, at TVC, make money by helping our customers get the best deals, especially on shopping festivals like . We make sure all your favourite brands are on our portal and regularly update their deals, ensuring you never miss out on a hot offer. Once you click on a deal, you’ll be redirected to its brand’s page. When you buy something using that offer, we get a small percentage from the price of that product. Moreover, we work extra hard when an event is nearby as online stores give the best deals during them. Check out our  page for more amazing event-based offers. Place your trust in us, and you’ll never be disappointed. Because at TVC, our primary goal is to make you save a stash!</p>
</div>


</div>


 </div>

</section>

<div className='bg-[#F2F0E6]'>
<section className="max-w-7xl mx-auto py-12 px-4 sm:px-6  text-center ">

            <div className='group  flex justify-center gap-3 items-center mb-8  pb-2  hover:' >
<h3 className='font-bold text-[#0F0F0F] group-hover:text-gray-500 text-3xl m-0 p-0 '>Clothing & Accessories </h3>
     <div className='text-[#0F0F0F] group-hover:text-gray-500 pt-2'>
      
      <Icon icon="icon-park-solid:right-c" width="28" height="28" />
      </div>  
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-2">
{deals.map((deal) => (
        <DealCard key={deal.id} deal={deal} />
      ))}

 
</div>

  </section>




</div>
<VoucherSignup></VoucherSignup>


    </>
  );
};

export default HomePage;