// Initialize Supabase client
        // Replace these with your actual Supabase credentials
        const SUPABASE_URL = 'https://qorqpjgaupzwqojqwaur.supabase.co';
        const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InFvcnFwamdhdXB6d3FvanF3YXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTQxNTU2MzAsImV4cCI6MjA2OTczMTYzMH0.EicNX9hGTagtInd4GTeBqf-vLOzwYtCO3uTCgCu3hOc';
        const supabase = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
        
        // Supabase Edge Function configuration for email sending
        const EMAIL_FUNCTION_URL = 'https://qorqpjgaupzwqojqwaur.supabase.co/functions/v1/send-email'
        
        // Function to send confirmation email via Supabase Edge Function
        async function sendConfirmationEmail(leadData) {
            try {
                // Fetch HTML email content from the template file
                const templateResponse = await fetch('/EmailTemplates/signup-survey-email.html');
                if (!templateResponse.ok) {
                    throw new Error('Failed to load email template');
                }
                let htmlContent = await templateResponse.text();
                
                // Replace template variables with actual data
                htmlContent = htmlContent.replace(/\${leadData\.first_name}/g, leadData.first_name);

                console.log('Sending confirmation email via Supabase Edge Function...')

                // Send email using Supabase Edge Function
                const response = await fetch(EMAIL_FUNCTION_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${SUPABASE_ANON_KEY}`,
                    },
                    body: JSON.stringify({
                        to_email: leadData.email,
                        subject: 'More than a car. This is a journey.',
                        html_content: htmlContent,
                    })
                })

                console.log('Edge Function response status:', response.status)

                if (!response.ok) {
                    const errorData = await response.json()
                    console.error('Edge Function error:', errorData)
                    throw new Error(`Email sending failed: ${errorData.details || errorData.error || response.statusText}`)
                }

                const result = await response.json()
                console.log('Confirmation email sent successfully via Edge Function:', result)
                return { success: true, data: result }

            } catch (error) {
                console.error('Email sending failed:', error)
                throw error
            }
        }
        
        // Dynamic options for "What are you looking for?" based on role selection
        const roleInputs = document.querySelectorAll('input[name="role"]');
        const lookingForOptions = document.getElementById('looking-for-options');
        
        const youngDriverOptions = [
            { value: 'guidance-prepared', text: 'Get guidance to be better prepared to handle the situation confidently' },
            { value: 'financial-skills', text: 'Learn financial skills in a real life situation' },
            { value: 'smooth-parents', text: 'Get a car easily, smoothly from my parents' },
            { value: 'curious', text: 'I\'m curious about the possibilities' },
            { value: 'other', text: 'Other' }
        ];
        
        const parentOptions = [
            { value: 'guidance-family', text: 'Get guidance to make the best choice for my family' },
            { value: 'teach-financial', text: 'Teach my child financial skills' },
            { value: 'quick-execute', text: 'Quickly execute on getting a car for my child' },
            { value: 'save-money', text: 'Save money (e.g., insurance)' },
            { value: 'curious', text: 'I\'m curious about the possibilities' },
            { value: 'other', text: 'Other' }
        ];
        
        function updateLookingForOptions(role) {
            const options = role === 'young-driver' ? youngDriverOptions : parentOptions;
            
            lookingForOptions.innerHTML = options.map(option => `
                <label class="flex items-center">
                    <input type="checkbox" name="looking-for" value="${option.value}" class="mr-3">
                    <span class="text-[#121516] text-base">${option.text}</span>
                </label>
            `).join('');
            
            // Add event listener for "Other" option to show text input
            const otherCheckbox = lookingForOptions.querySelector('input[value="other"]');
            if (otherCheckbox) {
                otherCheckbox.addEventListener('change', function() {
                    const existingTextInput = lookingForOptions.querySelector('#other-specify');
                    if (this.checked && !existingTextInput) {
                        const textInput = document.createElement('div');
                        textInput.id = 'other-specify';
                        textInput.className = 'ml-6 mt-2';
                        textInput.innerHTML = `
                            <input type="text" name="other-specify" placeholder="Please specify..." 
                                   class="w-full px-4 py-3 border border-[#dde1e3] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b2d0e5] focus:border-transparent">
                        `;
                        this.parentElement.appendChild(textInput);
                    } else if (!this.checked && existingTextInput) {
                        existingTextInput.remove();
                    }
                });
            }
        }
        
        // Add event listeners to role radio buttons
        roleInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value === 'young-driver' || this.value === 'parent') {
                    updateLookingForOptions(this.value);
                }
            });
        });
        
        // Form submission with Supabase integration
        document.getElementById('signup-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            try {
                // Show loading state
                submitButton.innerHTML = '<span class="truncate">Submitting...</span>';
                submitButton.disabled = true;
                
                // Get form data
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);
                
                // Get selected checkboxes for "looking-for"
                const lookingForCheckboxes = document.querySelectorAll('input[name="looking-for"]:checked');
                const lookingFor = Array.from(lookingForCheckboxes).map(cb => cb.value);
                
                // Get "other" specification if selected
                const otherSpecify = document.querySelector('input[name="other-specify"]')?.value || null;
                
                // Prepare data for Supabase
                const leadData = {
                    first_name: data['first-name'],
                    last_name: data['last-name'],
                    email: data.email,
                    phone: data.phone || null,
                    role: data.role,
                    timeline: data.timeline,
                    looking_for: lookingFor,
                    other_specify: otherSpecify
                };
                
                // Validate required fields
                if (!leadData.first_name || !leadData.last_name || !leadData.email || !leadData.role || !leadData.timeline || lookingFor.length === 0) {
                    throw new Error('Please fill in all required fields.');
                }
                
                // Validate email format
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(leadData.email)) {
                    throw new Error('Please enter a valid email address.');
                }
                
                // Insert data into Supabase
                const { data: result, error } = await supabase
                    .from('leads')
                    .insert([leadData]);
                
                if (error) {
                    if (error.code === '23505') { // Unique constraint violation
                        throw new Error('This email address is already registered.');
                    }
                    throw new Error('Failed to submit form. Please try again.');
                }
                
                // Send confirmation email via Resend
                try {
                    await sendConfirmationEmail(leadData);
                    console.log('Confirmation email sent successfully');
                } catch (emailError) {
                    console.warn('Email sending failed:', emailError);
                    // Don't show error to user since form submission was successful
                }
                
                // Success - show success message and reset form
                alert('Thank you for grabbing your spot! We\'ll be in touch soon. Check your email for confirmation.');
                this.reset();
                
                // Reset the dynamic options
                lookingForOptions.innerHTML = '<p class="text-[#6a7781] text-sm italic">Please select your role above to see relevant options</p>';
                
            } catch (error) {
                // Show error message
                alert(error.message || 'An error occurred. Please try again.');
            } finally {
                // Reset button state
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            }
        });