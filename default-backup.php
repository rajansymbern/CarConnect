<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarConnect - The Smarter Way to Lease & Earn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Calendly Widget CSS -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Mobile-first: White background by default for all devices */
            background-color: #ffffff; /* White background for smaller screens/mobile */
            color: #1F2937; /* Default text color for elements directly on this white background (Tailwind gray-900) */
        }
        
        /* Desktop: Apply background image using a media query */
        @media (min-width: 768px) { /* This corresponds to Tailwind's 'md' breakpoint */
            body {
                background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('Landing.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            body.text-white { /* Ensure body text becomes white on desktop if not overridden by child elements */
                color: #ffffff;
            }
        }

        .cta-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #06B6D4 100%);
        }
        .feature-icon, .step-icon {
            width: 48px;
            height: 48px;
        }
        .tab-active {
            background-color: #4F46E5;
            color: white;
            border-color: #4F46E5;
        }
        .tab-inactive {
            background-color: white;
            color: #4B5563;
            border-color: #D1D5DB;
        }
        /* Highlight section style now has a solid white background and dark text */
        .highlight-section {
            background-color: #ffffff; /* Solid white background */
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 1.5rem; /* Reduced padding for mobile */
            margin-top: -2rem; /* Reduced negative margin for mobile */
            position: relative;
            z-index: 10;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            color: #4A5568; /* Default text color for highlight section (Tailwind gray-700) */
        }
        
        /* Mobile-specific improvements */
        @media (max-width: 767px) {
            .highlight-section {
                padding: 1rem;
                margin-top: -1rem;
            }
            
            /* Better touch targets for  mobile */
            .mobile-touch-target {
                min-height: 44px;
                min-width: 44px;
            }
            
            /* Mobile-optimized journey section */
            .mobile-journey {
                display: block !important;
            }
            
            /* Improved mobile spacing */
            .mobile-spacing {
                padding: 1rem 0;
            }
            
            /* Mobile-optimized text sizes */
            .mobile-text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }
            
            .mobile-text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }
        }
        
        /* Desktop overrides */
        @media (min-width: 768px) {
            .highlight-section {
                padding: 2rem;
                margin-top: -4rem;
            }
        }
    </style>
</head>
<body class="text-gray-900 md:text-white"> <!-- Default text for mobile is gray-900, on desktop it's white -->

    <!-- Header / Logo - Now has a white background on mobile, transparent on desktop (implicitly from body) -->
    <header class="bg-white md:bg-transparent shadow-sm sticky top-0 z-40">
        <div class="container mx-auto px-4 md:px-6 py-3 flex justify-between items-center">
             <div class="flex items-center space-x-2 md:space-x-3">
                 <svg class="h-8 w-8 md:h-10 md:w-10 text-indigo-600" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path d="M5.12132 12.1213C5.12132 11.2211 5.86221 10.4792 6.76316 10.4792H8.38553C8.68112 10.4792 8.92237 10.238 8.92237 9.94237V8.32C8.92237 7.21803 9.79016 6.35024 10.8921 6.35024H13.1079C14.2098 6.35024 15.0776 7.21803 15.0776 8.32V9.94237C15.0776 10.238 15.3189 10.4792 15.6145 10.4792H17.2368C18.1378 10.4792 18.8787 11.2211 18.8787 12.1213V15.6842C18.8787 16.0357 18.6041 16.3103 18.2526 16.3103H16.8947C16.4447 16.3103 16.0842 16.6708 16.0842 17.1208C16.0842 17.5708 16.4447 17.9313 16.8947 17.9313H17.2368C18.8239 17.9313 20.1213 16.6339 20.1213 15.0468V12.1213C20.1213 10.5342 18.8239 9.23684 17.2368 9.23684H15.6145C15.0008 9.23684 14.5063 8.74237 14.5063 8.12868V8.12868C14.5063 7.60473 14.0724 7.17078 13.5484 7.17078H10.4516C9.92759 7.17078 9.49364 7.60473 9.49364 8.12868V8.12868C9.49364 8.74237 8.99918 9.23684 8.38553 9.23684H6.76316C5.17605 9.23684 3.87868 10.5342 3.87868 12.1213V15.0468C3.87868 16.6339 5.17605 17.9313 6.76316 17.9313H7.89474C8.34474 17.9313 8.70526 17.5708 8.70526 17.1208C8.70526 16.6708 8.34474 16.3103 7.89474 16.3103H6.76316C6.14947 16.3103 5.655 15.8158 5.655 15.2021V15.2021C5.655 14.7426 6.02421 14.3734 6.48368 14.3734H17.5163C17.9758 14.3734 18.345 14.7426 18.345 15.2021V15.2021C18.345 15.8158 17.8505 16.3103 17.2368 16.3103H16.0842C15.6342 16.3103 15.2737 16.6708 15.2737 17.1208C15.2737 17.5708 15.6342 17.9313 16.0842 17.9313H17.2368C18.1378 17.9313 18.8787 17.1895 18.8787 16.2892V13.8787C18.8787 13.5271 18.6041 13.2526 18.2526 13.2526H5.74737C5.39579 13.2526 5.12132 12.9782 5.12132 12.6266V12.1213Z" />
                 </svg>
                 <div>
                     <span class="text-lg md:text-xl font-bold text-gray-900 md:text-white">CarConnect</span> <!-- Text color changes based on breakpoint -->
                     <p class="text-xs text-gray-500 md:text-gray-200 -mt-1">A Peer-to-Peer Car Leasing Platform</p> <!-- Text color changes based on breakpoint -->
                 </div>
             </div>
             <div class="flex items-center">
                 <a id="header-join-btn" href="https://forms.gle/mGd4W3VjZRy1p3r68" target="_blank" class="bg-indigo-600 text-white font-bold py-2.5 px-4 md:px-5 rounded-lg text-sm hover:bg-indigo-700 transition-colors flex items-center justify-center mobile-touch-target"> <!-- Added flex items-center justify-center -->
                     Join the Waitlist
                 </a>
             </div>
        </div>
    </header>
    
    <section class="bg-white md:bg-transparent py-3 md:py-8"> <!-- Reduced py for mobile -->
        <div class="container mx-auto px-4 md:px-6 text-center">
             <div class="inline-flex rounded-lg shadow-md md:shadow-none w-full max-w-md"> <!-- Shadow only on mobile, full width on mobile -->
                 <button id="lessee-btn" class="flex-1 text-sm md:text-base font-semibold py-3 md:py-3 px-4 md:px-6 sm:px-8 rounded-l-lg border-2 border-r-0 transition-all duration-300 tab-active mobile-touch-target">
                     Lease your next car
                 </button>
                 <button id="owner-btn" class="flex-1 text-sm md:text-base font-semibold py-3 md:py-3 px-4 md:px-6 sm:px-8 rounded-r-lg border-2 transition-all duration-300 tab-inactive mobile-touch-target">
                     Build your own fleet
                 </button>
             </div>
        </div>
    </section>

    <main id="content-container">
        <div id="lessee-content">
            <section class="hero-bg py-8 md:pt-16 md:pb-32"> <!-- Adjusted py for mobile, and restored md:py for desktop -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 md:text-white leading-tight">Tired of the Old Way of Leasing a Car?</h1> <!-- Text color changes based on breakpoint -->
                    <div class="mt-4 md:mt-8 max-w-4xl mx-auto p-4 md:p-6 rounded-lg"> <!-- Reduced mt and p for mobile -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-8 gap-y-3 md:gap-y-4 text-left">
                           <div class="flex items-center"><svg class="w-5 h-5 md:w-6 md:h-6 text-red-500 mr-2 md:mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg><span class="text-sm md:text-base lg:text-lg text-gray-700 md:text-gray-200">Strict & costly mileage caps</span></div> <!-- Text size and color changes -->
                           <div class="flex items-center"><svg class="w-5 h-5 md:w-6 md:h-6 text-red-500 mr-2 md:mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg><span class="text-sm md:text-base lg:text-lg text-gray-700 md:text-gray-200">High end-of-lease charges</span></div> <!-- Text size and color changes -->
                           <div class="flex items-center"><svg class="w-5 h-5 md:w-6 md:h-6 text-red-500 mr-2 md:mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" /></svg><span class="text-sm md:text-base lg:text-lg text-gray-700 md:text-gray-200">Confusing terms</span></div> <!-- Text size and color changes -->
                           <div class="flex items-center"><svg class="w-5 h-5 md:w-6 md:h-6 text-red-500 mr-2 md:mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" /></svg><span class="text-sm md:text-base lg:text-lg text-gray-700 md:text-gray-200">Stressful negotiations</span></div> <!-- Text size and color changes -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-6 md:py-16 sm:py-24 mt-0 md:-mt-20"> <!-- Reduced py for mobile, and adjusted mt for mobile -->
                <div class="container mx-auto px-4 md:px-6">
                    <div class="highlight-section text-center text-gray-800">
                         <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">Introducing CarConnect</h2>
                         <p class="mt-3 text-base md:text-lg lg:text-xl text-indigo-600 font-semibold">The Smarter, Simpler Way to Lease Your Next Car</p>
                         <div class="mt-6 md:mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8"> <!-- Reduced mt and gap for mobile -->
                             <div class="text-center p-4 md:p-6"><h3 class="mt-3 md:mt-5 text-lg md:text-xl font-semibold text-gray-900">No hidden fees</h3><p class="mt-2 text-sm md:text-base text-gray-600">What you see is what you pay. Simple as that.</p></div>
                             <div class="text-center p-4 md:p-6"><h3 class="mt-3 md:mt-5 text-lg md:text-xl font-semibold text-gray-900">Great Pricing</h3><p class="mt-2 text-sm md:text-base text-gray-600">Our model reduces overhead, delivering amazing pricing for you.</p></div>
                             <div class="text-center p-4 md:p-6"><h3 class="mt-3 md:mt-5 text-lg md:text-xl font-semibold text-gray-900">More Flexibility</h3><p class="mt-2 text-sm md:text-base text-gray-600">Terms and mileage options that fit your life, not the other way around.</p></div>
                             <div class="text-center p-4 md:p-6"><h3 class="mt-3 md:mt-5 text-lg md:text-xl font-semibold text-gray-900">No Pressure</h3><p class="mt-2 text-sm md:text-base text-gray-600">Fair, upfront terms without stressful negotiations.</p></div>
                         </div>
                    </div>
                </div>
            </section>
            
            <!-- Mobile Journey Section - Now visible on mobile! -->
            <section class="bg-gray-50 py-6 md:py-8 sm:py-24 mobile-journey md:block"> <!-- Reduced py for mobile, now visible on mobile -->
                <div class="container mx-auto px-4 md:px-6">
                    <div class="text-center mb-6 md:mb-8">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">Your Journey with CarConnect</h2>
                    </div>
                    <div class="mt-6 md:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 md:gap-8"> <!-- Reduced mt and gap for mobile -->
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">1</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Discover & Customize</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Tell us what you're looking for and get an instant, clear price estimate.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">2</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Simple, Quick Approval</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Submit your information for a fast, transparent credit decision.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">3</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Sign & Schedule Delivery</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Review and sign your clear, straightforward lease online.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">4</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Manage & Enjoy</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Effortlessly manage your lease through our portal, with support when you need it.</p>
                        </div>
                        <div class="text-center sm:col-span-2 lg:col-span-1"> <!-- Span 2 columns on small screens -->
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">5</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Flexible End-of-Lease</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Choose to return, upgrade, or purchase your vehicle with ease.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="lessee-cta-section" class="cta-bg py-8 sm:py-20"> <!-- Reduced py for mobile -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">Interested? Join Our Waitlist Now!</h2>
                    <p class="mt-4 text-base md:text-lg text-indigo-100 max-w-2xl mx-auto">The first 1,000 lessees who sign up and successfully lease a car with us will get <span class="font-bold text-white">$500 cash back</span> on their first month!</p>
                    <div class="mt-6 md:mt-8">
                        <a href="https://forms.gle/mGd4W3VjZRy1p3r68" target="_blank" class="inline-block bg-white text-indigo-600 font-bold py-3 md:py-3 px-6 md:px-8 rounded-lg shadow-lg text-base md:text-lg hover:bg-gray-100 transition-transform transform hover:scale-105 mobile-touch-target"> <!-- Reduced mt for mobile -->
                            Join the Waitlist
                        </a>
                    </div>
                </div>
            </section>
            <section id="lessee-schedule-section" class="bg-gray-50 py-8 sm:py-20"> <!-- Reduced py for mobile -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-8">Schedule a Call with Us!</h2> <!-- Reduced mb for mobile -->
                    <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto mb-6 md:mb-10"> <!-- Reduced mb for mobile -->
                        We'd love to chat more about how CarConnect can help you. Click the button below to book a time that works for you.
                    </p>
                    <button onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rchandra-aggie/30min'});return false;" class="inline-block bg-indigo-600 text-white font-bold py-3 md:py-3 px-6 md:px-8 rounded-lg shadow-lg text-base md:text-lg hover:bg-indigo-700 transition-transform transform hover:scale-105 mobile-touch-target">
                        Schedule Your Intro Call
                    </button>
                </div>
            </section>
        </div>

        <div id="owner-content" class="hidden">
            <section class="hero-bg py-8 md:pt-16 md:pb-32"> <!-- Adjusted py for mobile, and restored md:py for desktop -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 md:text-white leading-tight">Build Your Fleet Business With CarConnect</h1> <!-- Text color changes based on breakpoint -->
                    <p class="mt-4 md:mt-8 text-base md:text-lg text-gray-700 md:text-gray-200 max-w-3xl mx-auto">The platform to help you build your fleet business and lease out vehicles with confidence and ease.</p> <!-- Text color changes -->
                </div>
            </section>
            
            <!-- Mobile Owner Benefits Section - Now visible on mobile! -->
            <section class="bg-gray-50 py-6 md:py-8 sm:py-24 mobile-journey md:block"> <!-- Reduced py for mobile, now visible on mobile -->
                <div class="container mx-auto px-4 md:px-6">
                    <div class="text-center mb-6 md:mb-12">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">Why Build Your Fleet with CarConnect?</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 max-w-6xl mx-auto">
                        <div class="text-center bg-white p-6 md:p-8 rounded-lg shadow-md">
                            <div class="flex items-center justify-center h-10 w-10 md:h-12 md:w-12 mx-auto bg-indigo-100 text-indigo-600 rounded-full">
                                <svg class="h-6 w-6 md:h-7 md:w-7 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
                            </div>
                            <h3 class="mt-4 md:mt-5 text-lg md:text-xl font-semibold text-gray-900">Start Your Business Simply</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">We provide a guided path to get you started, including an AI copilot to help you easily form an LLC.</p>
                        </div>
                        <div class="text-center bg-white p-6 md:p-8 rounded-lg shadow-md">
                             <div class="flex items-center justify-center h-10 w-10 md:h-12 md:w-12 mx-auto bg-indigo-100 text-indigo-600 rounded-full">
                                 <svg class="h-5 w-5 md:h-6 md:w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                             </div>
                            <h3 class="mt-4 md:mt-4 text-lg md:text-xl font-semibold text-gray-900">Lease with Confidence</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Your assets are protected by leasing to our community of thoroughly screened and verified prime customers.</p>
                        </div>
                        <div class="text-center bg-white p-6 md:p-8 rounded-lg shadow-md">
                             <div class="flex items-center justify-center h-10 w-10 md:h-12 md:w-12 mx-auto bg-indigo-100 text-indigo-600 rounded-full">
                                 <svg class="h-6 w-6 md:h-7 md:w-7 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.192l-6.767-6.767a2.25 2.25 0 0 1 3.182-3.182l6.767 6.767c1.455-2.966 2.192-6.37 2.192-9.921a8.25 8.25 0 0 0-16.5 0c0 3.552.737 6.955 2.192 9.921Z" /></svg>
                             </div>
                            <h3 class="mt-4 md:mt-4 text-lg md:text-xl font-semibold text-gray-900">Maximize Your Returns</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Earn consistent monthly income and get data-driven insights to make informed investment decisions.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Mobile Owner Journey Section - Now visible on mobile! -->
            <section class="bg-gray-50 py-6 md:py-8 sm:py-24 mobile-journey md:block"> <!-- Reduced py for mobile, now visible on mobile -->
                <div class="container mx-auto px-4 md:px-6">
                    <div class="text-center mb-6 md:mb-12">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">How It Works: A Simple 4-Step Path</h2>
                    </div>
                    <div class="mt-6 md:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8"> <!-- Reduced mt and gap for mobile -->
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">1</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Set up</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Complete our streamlined onboarding and set up your fleet company with our guided tools.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">2</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Get Matched</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Receive lease requests and match with pre-qualified lessees from our growing customer base.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">3</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Sign & Deliver</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Finalize your lease with secure e-signatures and use our simple checklist for a transparent vehicle handover.</p>
                        </div>
                        <div class="text-center">
                            <div class="step-icon flex items-center justify-center h-12 w-12 md:h-16 md:w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-lg md:text-2xl">4</div>
                            <h3 class="mt-4 md:mt-5 text-base md:text-lg font-semibold text-gray-900">Earn Monthly</h3>
                            <p class="mt-2 text-xs md:text-sm text-gray-600">Once the lease begins, CarConnect manages the payment process, delivering your earnings directly to you each month.</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="owner-cta-section" class="cta-bg py-8 sm:py-20"> <!-- Reduced py for mobile -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">Ready to Start Earning?</h2>
                    <p class="mt-4 text-base md:text-lg text-indigo-100 max-w-2xl mx-auto">Join our waitlist to be one of the first car owners on the CarConnect platform.</p>
                    <div class="mt-6 md:mt-8">
                        <a href="https://forms.gle/v2Q6cU2oN1EtVYdt7" target="_blank" class="inline-block bg-white text-indigo-600 font-bold py-3 md:py-3 px-6 md:px-8 rounded-lg shadow-lg text-base md:text-lg hover:bg-gray-100 transition-transform transform hover:scale-105 mobile-touch-target"> <!-- Reduced mt for mobile -->
                            Join the Waitlist
                        </a>
                    </div>
                </div>
            </section>
            <section id="owner-schedule-section" class="bg-gray-50 py-8 sm:py-20 mobile-journey"> <!-- Reduced py for mobile, now visible on mobile -->
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 md:mb-8">Discuss Your Fleet Strategy!</h2> <!-- Reduced mb for mobile -->
                    <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto mb-6 md:mb-10"> <!-- Reduced mb for mobile -->
                        Learn more about building your profitable fleet. Click the button below to book a time that works for you.
                    </p>
                    <button onclick="Calendly.initPopupWidget({url: 'https://calendly.com/rchandra-aggie/30min'});return false;" class="inline-block bg-indigo-600 text-white font-bold py-3 md:py-3 px-6 md:px-8 rounded-lg shadow-lg text-base md:text-lg hover:bg-indigo-700 transition-transform transform hover:scale-105 mobile-touch-target">
                        Schedule Your Intro Call
                    </button>
                </div>
            </section>
        </div>
    </main>
    
    <footer class="bg-gray-800 py-6 md:py-8">
        <div class="container mx-auto px-4 md:px-6 text-center text-gray-400 text-sm">
            <p>&copy; 2025 CarConnect. All Rights Reserved.</p>
        </div>
    </footer>

    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lesseeBtn = document.getElementById('lessee-btn');
            const ownerBtn = document.getElementById('owner-btn');
            const lesseeContent = document.getElementById('lessee-content');
            const ownerContent = document.getElementById('owner-content');
            const headerJoinBtn = document.getElementById('header-join-btn');


            let activeTab = 'lessee';

            function switchTabs(selectedTab) {
                // Determine which hero section and content to show/hide based on tab
                const currentLesseeContent = document.getElementById('lessee-content');
                const currentOwnerContent = document.getElementById('owner-content');
                
                // Hero sections are now part of lessee/owner content directly
                const lesseeHeroSection = currentLesseeContent.querySelector('.hero-bg');
                const ownerHeroSection = currentOwnerContent.querySelector('.hero-bg');


                if (selectedTab === 'lessee') {
                    currentLesseeContent.classList.remove('hidden');
                    currentOwnerContent.classList.add('hidden');
                    lesseeBtn.classList.add('tab-active');
                    lesseeBtn.classList.remove('tab-inactive');
                    ownerBtn.classList.add('tab-inactive');
                    ownerBtn.classList.remove('tab-active');
                    headerJoinBtn.href = "https://forms.gle/mGd4W3VjZRy1p3r68";
                } else {
                    currentOwnerContent.classList.remove('hidden');
                    currentLesseeContent.classList.add('hidden');
                    ownerBtn.classList.add('tab-active');
                    ownerBtn.classList.remove('tab-inactive');
                    lesseeBtn.classList.add('tab-inactive');
                    lesseeBtn.classList.remove('tab-active');
                    headerJoinBtn.href = "https://forms.gle/v2Q6cU2oN1EtVYdt7";
                }
                activeTab = selectedTab; // Update active tab
            }

            lesseeBtn.addEventListener('click', () => switchTabs('lessee'));
            ownerBtn.addEventListener('click', () => switchTabs('owner'));

            switchTabs(activeTab); // Initialize tab visibility on load
        });
    </script>
</body>
</html>
