// Initialize Supabase client
const supabase = window.supabase.createClient(
    window.SUPABASE_CONFIG.URL,
    window.SUPABASE_CONFIG.ANON_KEY
)

// Function to submit form data to Supabase
async function submitToSupabase(formData) {
    try {
        const { data, error } = await supabase
            .from('waitlist_submissions')
            .insert([
                {
                    full_name: formData.fullName,
                    email: formData.email,
                    phone: formData.phone,
                    location: formData.location,
                    age_range: formData.ageRange,
                    primary_goal: formData.primaryGoal,
                    goal_other: formData.goalOther || null,
                    profession: formData.profession,
                    llc_status: formData.llcStatus,
                    interview_willingness: formData.interviewWillingness,
                    submitted_at: new Date().toISOString()
                }
            ])

        if (error) {
            console.error('Error submitting to Supabase:', error)
            throw error
        }

        console.log('Successfully submitted to Supabase:', data)
        return { success: true, data }
    } catch (error) {
        console.error('Supabase submission failed:', error)
        return { success: false, error: error.message }
    }
}

// Function to handle form submission
async function handleFormSubmission(formElement) {
    const formData = new FormData(formElement)
    const data = Object.fromEntries(formData)
    
    // Show loading state
    const submitBtn = document.getElementById('submitBtn')
    const submitText = document.getElementById('submitText')
    const submitLoading = document.getElementById('submitLoading')
    
    submitText.style.display = 'none'
    submitLoading.style.display = 'inline-block'
    submitBtn.disabled = true
    
    try {
        // Submit to Supabase
        const result = await submitToSupabase(data)
        
        if (result.success) {
            // Show success message
            document.getElementById('fleetBuilderForm').style.display = 'none'
            document.getElementById('successMessage').classList.remove('hidden')
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' })
        } else {
            // Show error message
            alert('There was an error submitting your form. Please try again.')
            
            // Reset button state
            submitText.style.display = 'inline'
            submitLoading.style.display = 'none'
            submitBtn.disabled = false
        }
    } catch (error) {
        console.error('Form submission error:', error)
        alert('There was an error submitting your form. Please try again.')
        
        // Reset button state
        submitText.style.display = 'inline'
        submitLoading.style.display = 'none'
        submitBtn.disabled = false
    }
}

// Export functions for use in other files
window.submitToSupabase = submitToSupabase
window.handleFormSubmission = handleFormSubmission 