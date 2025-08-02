import { serve } from "https://deno.land/std@0.168.0/http/server.ts"
import { createClient } from 'https://esm.sh/@supabase/supabase-js@2'

const corsHeaders = {
  'Access-Control-Allow-Origin': '*',
  'Access-Control-Allow-Headers': 'authorization, x-client-info, apikey, content-type',
}

serve(async (req) => {
  // Handle CORS preflight requests
  if (req.method === 'OPTIONS') {
    return new Response('ok', { headers: corsHeaders })
  }

  try {
    const { lead } = await req.json()
    
    // Create Supabase client
    const supabaseClient = createClient(
      Deno.env.get('SUPABASE_URL') ?? '',
      Deno.env.get('SUPABASE_SERVICE_ROLE_KEY') ?? ''
    )

    // Send email notification
    const emailContent = `
      New Lead Submitted!
      
      Name: ${lead.first_name} ${lead.last_name}
      Email: ${lead.email}
      Phone: ${lead.phone || 'Not provided'}
      Role: ${lead.role}
      Timeline: ${lead.timeline}
      Looking for: ${lead.looking_for.join(', ')}
      ${lead.other_specify ? `Other: ${lead.other_specify}` : ''}
      
      Submitted at: ${new Date().toLocaleString()}
    `

    // You can integrate with your preferred email service here
    // For example, using Resend, SendGrid, or Nodemailer
    
    // For now, we'll log the notification (you can replace this with actual email sending)
    console.log('New lead notification:', emailContent)

    return new Response(
      JSON.stringify({ success: true, message: 'Notification sent' }),
      { 
        headers: { ...corsHeaders, 'Content-Type': 'application/json' },
        status: 200 
      }
    )

  } catch (error) {
    return new Response(
      JSON.stringify({ error: error.message }),
      { 
        headers: { ...corsHeaders, 'Content-Type': 'application/json' },
        status: 400 
      }
    )
  }
}) 