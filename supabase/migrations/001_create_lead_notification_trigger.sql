-- Create a function to handle lead notifications
CREATE OR REPLACE FUNCTION handle_new_lead()
RETURNS TRIGGER AS $$
BEGIN
  -- Call the edge function to send notification
  PERFORM
    net.http_post(
      url := 'https://qorqpjgaupzwqojqwaur.supabase.co/functions/v1/lead-notification',
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
CREATE TRIGGER lead_notification_trigger
  AFTER INSERT ON leads
  FOR EACH ROW
  EXECUTE FUNCTION handle_new_lead(); 