// Supabase Configuration
// Replace these values with your actual Supabase project credentials

const SUPABASE_CONFIG = {
    URL: 'https://poiieotehmmgtcokhswu.supabase.co', // e.g., 'https://your-project.supabase.co'
    ANON_KEY: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBvaWllb3RlaG1tZ3Rjb2toc3d1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTIzMTEzMTUsImV4cCI6MjA2Nzg4NzMxNX0.77tQtzGcHMPgvYwstey9hPlR82CrkR3GC1uiPWKWeMY' // Your public anon key from Supabase dashboard
}

// Example of how to get these values:
// 1. Go to https://supabase.com and create a new project
// 2. Go to Settings > API in your Supabase dashboard
// 3. Copy the "Project URL" and "anon public" key
// 4. Replace the values above with your actual credentials

// Export for use in other files
window.SUPABASE_CONFIG = SUPABASE_CONFIG 