import React from 'react'
import { Link } from 'react-router-dom'
import './navbar.css'
import CurrentUser from '../FackApi/CurrentUserData'
// Font Awesome Icons
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faBell, faEnvelope, faBars} from '@fortawesome/free-solid-svg-icons'

export default function Navbar() {
  return (
    <nav>
      <div className='nav-container'>
        <div className='nav-left'>
          <Link to='/'>
            <h3 className='logo'>NFEST</h3>
          </Link>
          
        </div>

        <div className='nav-right'>   
          <div className='user'>
            <img src={CurrentUser.map(user => (user.ProfileImage))} alt=""/>
            <h4>Raka</h4>
          </div>
        </div>
      </div>
    </nav>
  )
}
