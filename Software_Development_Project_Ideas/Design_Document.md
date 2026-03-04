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

#### Intentional Dating

- Including guidelines on how to do Intentional dating
- Setting a limit for number of matches at a time
- Setting a limit for the number of messages between two accounts

#### Compatibility score

- Based on interests, location & sexuality show relevant profiles

#### Ice-Breakers

- Prompt users with Ice-Breakers
- When reaching message limit prompt users with date ideas

## WebPage Mockups

### Google-based UI mockups

#### Login page

![Loginpage](Photos\LoginPage.png)

#### Register page

![Registerpage](Photos\RegisterPage.png)

#### My Profile page section

![MyProfile1](Photos\MyProfile1.png)
![MyProfile2](Photos\MyProfile2.png)

#### Edit Account page

![EditAccount](Photos\EditAccountpage.png)

#### Guidelines page

![Guidelines](Photos\GuidelinePage.png)

## Database Tables

### User set-up Table
| Field            | Type                                       | KeyType |
| ---------------- | ------------------------------------------ | ------- |
| user_id          | INT                                        | PK      |
| username         | VARCHAR                                    | UNIQUE  |
| email            | VARCHAR                                    | UNIQUE  |
| password_hash    | VARCHAR                                    |         |
| role             | ENUM('user','admin')                       |         |
| gender           | ENUM('male','female','non_binary','other') |         |
| date_of_birth    | DATE                                       |         |
| country          | VARCHAR                                    |         |
| bio              | TEXT                                       |         |
| reputation_score | INT                                        |         |
| is_active        | BOOLEAN                                    |         |
| is_banned        | BOOLEAN                                    |         |
| created_at       | TIMESTAMP                                  |         |
| last_login_at    | TIMESTAMP                                  |         |
| deleted_at       | TIMESTAMP (nullable)                       |         |

### Permissible Interests Table
| Field         | Type    | KeyType |
| ------------- | ------- | ------- |
| interest_id   | INT     | PK      |
| interest_name | VARCHAR | UNIQUE  |

### User interest Table
| Field       | Type | KeyType                        |
| ----------- | ---- | ------------------------------ |
| user_id     | INT  | PK, FK → users.user_id         |
| interest_id | INT  | PK, FK → interests.interest_id |


### Preferences Table
| Field             | Type                                             | KeyType                |
| ----------------- | ------------------------------------------------ | ---------------------- |
| user_id           | INT                                              | PK, FK → users.user_id |
| min_age           | INT                                              |                        |
| max_age           | INT                                              |                        |
| preferred_gender  | ENUM('male','female','non_binary','other','any') |                        |
| preferred_country | VARCHAR                                          |                        |


### Likes Table
| Field      | Type      | KeyType                |
| ---------- | --------- | ---------------------- |
| liker_id   | INT       | PK, FK → users.user_id |
| liked_id   | INT       | PK, FK → users.user_id |
| created_at | TIMESTAMP |                        |

### Matches Table
| Field      | Type                                 | KeyType            |
| ---------- | ------------------------------------ | ------------------ |
| match_id   | INT                                  | PK                 |
| user1_id   | INT                                  | FK → users.user_id |
| user2_id   | INT                                  | FK → users.user_id |
| status     | ENUM('active','unmatched','blocked') |                    |
| created_at | TIMESTAMP                            |                    |
| updated_at | TIMESTAMP                            |                    |
| deleted_at | TIMESTAMP (nullable)                 |                    |

### Messages Table
| Field        | Type                 | KeyType               |
| ------------ | -------------------- | --------------------- |
| message_id   | INT                  | PK                    |
| match_id     | INT                  | FK → matches.match_id |
| sender_id    | INT                  | FK → users.user_id    |
| message_text | TEXT                 |                       |
| is_read      | BOOLEAN              |                       |
| created_at   | TIMESTAMP            |                       |
| deleted_at   | TIMESTAMP (nullable) |                       |


### Blocks Table
| Field      | Type      | KeyType            |
| ---------- | --------- | ------------------ |
| block_id   | INT       | PK                 |
| blocker_id | INT       | FK → users.user_id |
| blocked_id | INT       | FK → users.user_id |
| created_at | TIMESTAMP |                    |


### Reports Table
| Field            | Type                                    | KeyType            |
| ---------------- | --------------------------------------- | ------------------ |
| report_id        | INT                                     | PK                 |
| reporter_id      | INT                                     | FK → users.user_id |
| reported_user_id | INT                                     | FK → users.user_id |
| message_id       | INT (nullable FK → messages.message_id) |                    |
| reason           | TEXT                                    |                    |
| status           | ENUM('open','reviewed','dismissed')     |                    |
| created_at       | TIMESTAMP                               |                    |



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

### changeEmail

### changePassword

### getAccount

### getProfile

### modifyProfile

### setVisible

### getImage

### createAccount

| Process No.          | 16                                                                                           |
|----------------------|----------------------------------------------------------------------------------------------|
| Title                | Create a New User Account                                                                    |
| Brief Description    | Adds a new user to the User Set-up table                                                     |
| Inputs               | User Email & Password                                                                        |
| Detailed Description | Adds a new user to the database, assigning them a unique user_id and hashing their password. |
| Output               | User gets redirected to the profile page.                                                    |

### setProfilePhoto

| Process No.          | 17                                                                                                                                                                                                                      |
|----------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Title                | Sets a Users Profile Photo                                                                                                                                                                                              |
| Brief Description    | Adds a new profile photo to the users profile                                                                                                                                                                           |
| Inputs               | Profile Image                                                                                                                                                                                                           |
| Detailed Description | The user can add a profile picture at account creation and this will appear when other users view their profile. It can be changed after account creation by uploading a new image. It is associated with their user_id |
| Output               | None                                                                                                                                                                                                                    |

### get ProfilePhoto

| Process No.          | 18                                                                                                                                                                                                            |
|----------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Title                | Returns a Users Profile Photo                                                                                                                                                                                 |
| Brief Description    | Returns a users profile photo when their profile is being viewed                                                                                                                                              |
| Inputs               | User_id                                                                                                                                                                                                       |
| Detailed Description | When a user is viewing another users profile, their profile picture is returned to be displayed. This also occurs when a user looks at their own profile. The profile photo is associated with their user_id. |
| Output               | Profile Photo                                                                                                                                                                                                 |

### setAdditionalPhotos
### getAdditionalPhotos

### setBio
### getBio

### setName
### getName

### setAge
### getAge

### setGender
### getGender

### setLocation
### getLocation

### calculateReputation
### getReputation

### setType
### getType

### setInterests
### getInterests

