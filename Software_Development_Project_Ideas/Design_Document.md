# CS4116 Design Document 

## Fields & Futures 

### Group 2 - Members 

James Connolly 23388102
Enda Buckley 2358165
Kaiden 21339465
William 23390794

## Introduction: 

Our dating platform, Fields & Futures, is designed to support meaningful, long-term relationships within rural communities. In a world where many dating apps prioritise fast swiping and casual interactions, Fields & Futures focuses on intentional dating rooted in shared values and lifestyle compatibility. The platform allows users to create detailed profiles that expertly reflect their personal interests. With a focus on “intentional dating”, Fields & Futures is one of the first dating websites to encourage users to give each potential matches through and genuine consideration. Users can search for others based on profile information such as age, gender, location, and selected interests, with a particular emphasis on rural living and compatibility of long-term intentions. Registered users can express interest in one another. When two users mutually indicate interest, a match is formed, and they are able to communicate through our platform’s internal messaging system. Fields & Futures aims to provide a slower, more thoughtful alternative to mainstream dating platforms by prioritising authenticity and genuine future planning.

## High-Level Functionality 

### Required Functionality

#### User Registration & Profile 

- Create an account and log in securely
- Create and edit a personal profile
- Provide details such as description, interests, preferences, and basic information

Passwords **must not be stored in plain text**

#### Browsing & Searching

- Browse other users 
- Search using multiple criteria 
- Apply filters and sorting

Search functionality must be implemented using database queries, not manual filtering in PHP

#### Matching & Connecting

- Express interest in another user
- Form a connection only if both users indicate interest
- View existing matches
- Complain about harassment from users
- Block other users

#### Messaging

Matched users must be able to communicate through an **internal messaging system**. The system should identify and prevent users from sending phone numbers through the messaging system - we want to keep users on our site as much as possible!

#### Administrative Controls

- Ban or suspend users
- Remove inappropriate content
- Edit user profile

#### Security 

- Password hashing
- Secure session handling
- Input validation and sanitisation
- Protection against basic SQL injection
- No fatal runtime errors
- No hard-coded credentials 
- Clean and consistent navigation
- Logical file structure

### Additional Functionality

## WebPage Mockups

### Google-based UI mockups

#### Basic Prototype for matching page

#### Login page

#### Profile Edit page

#### Messaging preview

#### Admin page

## Database Tables

### Login Table

### Profile Table

### Images Table

### Matches Table

### Chat Table

## Process Chart List

### User

#### Path Index

#### Login

#### Registration

#### Index page

#### Inbox

### Admin

#### Path Index

#### Login

#### Profile viewing

## Process Tables

### sendLike

### getLikes

### getUsers

### setStatus

### setFavourite

### getFavourite

### sendMessage

### getMessages

### setEmail

### setPassword

### getAccount

### getProfile

### modifyProfile

### setName

### getName

### setVisible

### createAccount

### getImage