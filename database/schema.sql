-- Create waitlist_submissions table
CREATE TABLE IF NOT EXISTS waitlist_submissions (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    full_name TEXT NOT NULL,
    email TEXT NOT NULL,
    phone TEXT NOT NULL,
    location TEXT NOT NULL,
    age_range TEXT NOT NULL,
    primary_goal TEXT NOT NULL,
    goal_other TEXT,
    profession TEXT NOT NULL,
    llc_status TEXT NOT NULL,
    interview_willingness TEXT NOT NULL,
    submitted_at TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- Create indexes for better query performance
CREATE INDEX IF NOT EXISTS idx_waitlist_email ON waitlist_submissions(email);
CREATE INDEX IF NOT EXISTS idx_waitlist_submitted_at ON waitlist_submissions(submitted_at);

-- Enable Row Level Security (RLS)
ALTER TABLE waitlist_submissions ENABLE ROW LEVEL SECURITY;

-- Create policy to allow inserts from authenticated and anonymous users
CREATE POLICY "Allow inserts for all users" ON waitlist_submissions
    FOR INSERT WITH CHECK (true);

-- Create policy to allow reads for authenticated users only
CREATE POLICY "Allow reads for authenticated users" ON waitlist_submissions
    FOR SELECT USING (auth.role() = 'authenticated');

-- Create a function to automatically update created_at
CREATE OR REPLACE FUNCTION update_created_at_column()
RETURNS TRIGGER AS $$
BEGIN
    NEW.created_at = NOW();
    RETURN NEW;
END;
$$ language 'plpgsql';

-- Create trigger to automatically update created_at
CREATE TRIGGER update_waitlist_submissions_created_at 
    BEFORE UPDATE ON waitlist_submissions 
    FOR EACH ROW 
    EXECUTE FUNCTION update_created_at_column(); 