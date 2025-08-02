-- Enable the http extension if not already enabled
CREATE EXTENSION IF NOT EXISTS "http" WITH SCHEMA "extensions";

-- Create a function to handle welcome emails
CREATE OR REPLACE FUNCTION handle_welcome_email()
RETURNS TRIGGER AS $$
BEGIN
  -- Call the edge function to send welcome email
  PERFORM
    extensions.http_post(
      url := 'https://qorqpjgaupzwqojqwaur.supabase.co/functions/v1/welcome-email',
      headers := '{"Content-Type": "application/json", "Authorization": "Bearer ' || current_setting('request.header.apikey') || '"}',
      body := json_build_object(
        'lead', json_build_object(
          'first_name', NEW.first_name,
          'last_name', NEW.last_name,
          'email', NEW.email,
          'phone', NEW.phone,
          'role', NEW.role,
          'timeline', NEW.timeline,
          'looking_for', NEW.looking_for,
          'other_specify', NEW.other_specify
        )
      )::text
    );
  
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Create the trigger
DROP TRIGGER IF EXISTS welcome_email_trigger ON leads;
CREATE TRIGGER welcome_email_trigger
  AFTER INSERT ON leads
  FOR EACH ROW
  EXECUTE FUNCTION handle_welcome_email(); 