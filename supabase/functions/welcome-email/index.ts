import { serve } from "https://deno.land/std@0.168.0/http/server.ts"

const corsHeaders = {
  'Access-Control-Allow-Origin': '*',
  'Access-Control-Allow-Headers': 'authorization, x-client-info, apikey, content-type',
}

serve(async (req) => {
  if (req.method === 'OPTIONS') {
    return new Response('ok', { headers: corsHeaders })
  }

  try {
    const { lead } = await req.json()
    
    // Determine welcome email content based on role
    const isYoungDriver = lead.role === 'young-driver'
    
    const subject = isYoungDriver 
      ? "Hand-me-down? More like hand-me-legend." 
      : "Hand-me-down? More like hand-me-legend."
    
    // Custom email content for both young drivers and parents
    const welcomeContent = `
      <h2>Welcome to CarConnect! 🚗</h2>
      <p>Hi ${lead.first_name},</p>
      <p>Getting the first car is a rite of passage. The paperwork, insurance headaches, and surprise costs? Not so much.</p>
      <p><strong>We fix that.</strong></p>
      <p>CarConnect is a guided platform that helps families turn a stressful car process into a simple, transparent journey.</p>
      <p>We handle the details so you can focus on the family moments to celebrate your child's independence.</p>
      <p>See you on September 1st.</p>
      <p>All the best,<br>The CarConnect Team</p>
    `
    
    // Send email using Resend
    const emailResponse = await fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${Deno.env.get('RESEND_API_KEY')}`,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        from: 'CarConnect <noreply@carconnect.com>',
        to: [lead.email],
        bcc: ['your-email@example.com'], // Replace with your email
        subject: subject,
        html: `
          <!DOCTYPE html>
          <html>
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Welcome to CarConnect</title>
            <style>
              body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
              .container { max-width: 600px; margin: 0 auto; padding: 20px; }
              .header { background-color: #b2d0e5; padding: 20px; text-align: center; }
              .content { padding: 20px; }
              .footer { background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #666; }
            </style>
          </head>
          <body>
            <div class="container">
              <div class="header">
                <h1 style="margin: 0; color: #121516;">CarConnect</h1>
              </div>
              <div class="content">
                ${welcomeContent}
              </div>
              <div class="footer">
                <p>You're receiving this email because you signed up for CarConnect early access.</p>
                <p>© 2024 CarConnect. All rights reserved.</p>
              </div>
            </div>
          </body>
          </html>
        `
      })
    })

    if (!emailResponse.ok) {
      const errorData = await emailResponse.text()
      throw new Error(`Failed to send email: ${errorData}`)
    }

    return new Response(
      JSON.stringify({ success: true, message: 'Welcome email sent' }),
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