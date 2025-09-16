import React from 'react'
import { Outlet, RouterProvider, createBrowserRouter } from 'react-router-dom'

// Import Halaman
import Login from '../Pages/Login/Login'
import Signup from '../Pages/SignUp/Signup'
import Home from '../Pages/Home/Home'
import Profile from '../Pages/Profile/Profile'
import ChatBox from '../Pages/ChatBox/ChatBox'

// Import Component
import Navbar from '../components/navbar/navbar'
import LeftBar from '../components/leftbar/leftbar'
import RightBar from '../components/rightbar/rightbar'

export default function LayOut() {
  // Feed
  const Feed = () => {
    return (
      <>
      <Navbar />
      <main>
        <LeftBar />
        <div className='container'>
          <Outlet />
        </div>
        <RightBar />
      </main>
      </>
    )
  }
  // Router
  const router = createBrowserRouter([
    {
      path: '/',
      element : <Feed />,
      children : [
        {
          path: '/',
          element: <Home />
        },
        {
          path: '/profile/:id',
          element: <Profile />
        },
        {
          path: '/chatbox/:id',
          element: <ChatBox />
        }
      ]
    },
    {
      path: '/login',
      element: <Login />
    },
    {
      path: '/signup',
      element: <Signup />
    },
  ])
    
  return (
    <>
      <RouterProvider router={router}/>
    </>
  )
}
