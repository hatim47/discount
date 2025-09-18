// resources/js/components/layout/Footer.jsx
import React from 'react';
import { Link } from 'react-router-dom'; // Use Link for internal navigation
import { Icon } from "@iconify/react";

const footerData = {
  SAVING: ["Get Inspired", "Student Offers", "App", "Deal Seeker"],
  HELP: ["All Events", "Black Friday Offers", "Cyber Monday Offers", "Christmas Deals"],
  ABOUT: ["About us", "Advertise With Us", "Privacy Policy", "Site map", "Contact us"],
  MOBILE_APP: [
    { name: "App Store", img: "/apple-store.png", link: "#" },
    { name: "Google Play", img: "/google-play.png", link: "#" },
  ],
  BROWSER_EXTENSION: [
    { name: "Chrome Web Store", img: "/chrome-store.png", link: "#" },
  ],
};

const socialLinks = [
  { icon: "mdi:facebook", link: "#" },
  { icon: "mdi:twitter", link: "#" },
  { icon: "mdi:instagram", link: "#" },
  { icon: "mdi:pinterest", link: "#" },
  { icon: "mdi:youtube", link: "#" },
  { icon: "mdi:linkedin", link: "#" },
];

export default function Footer() {
  return (
    <footer className="bg-gray-50 border-t mt-10">
      <div className="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-5 gap-8">
        {/* Dynamic Sections */}
        {Object.entries(footerData).map(([section, items]) => (
          <div key={section}>
            <h3 className="text-green-600 font-semibold mb-3">
              {section.replace("_", " ")}
            </h3>
            <ul className="space-y-2 text-gray-700">
              {Array.isArray(items) &&
                items.map((item, idx) =>
                  typeof item === "string" ? (
                    <li
                      key={idx}
                      className="hover:underline cursor-pointer"
                    >
                      {item}
                    </li>
                  ) : (
                    <li key={idx}>
                      <a href={item.link}>
                        <img src={item.img} alt={item.name} className="w-36" />
                      </a>
                    </li>
                  )
                )}
            </ul>
          </div>
        ))}
      </div>

      {/* Social Icons */}
      <div className="flex justify-center space-x-6 py-4">
        {socialLinks.map((s, idx) => (
          <a
            key={idx}
            href={s.link}
            className="text-gray-600 hover:text-green-600 text-2xl"
          >
            <Icon icon={s.icon} />
          </a>
        ))}
      </div>

      {/* Disclaimer */}
      <p className="text-center text-gray-500 text-sm px-4">
        Disclosure: If you buy a product or service after clicking one of our
        links, we may be paid a commission
      </p>

      {/* Logo */}
      <div className="flex justify-center py-6">
        <h1 className="text-2xl font-bold">TopVouchersCode</h1>
      </div>

      <p className="text-center text-gray-400 text-xs pb-6">
        Copyright Topvoucherscode.co.uk. All rights reserved.
      </p>
    </footer>
  );
}