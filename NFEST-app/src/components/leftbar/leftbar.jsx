import React from 'react'
import { Link } from 'react-router-dom'
import './leftbar.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faHome, faBell, } from '@fortawesome/free-solid-svg-icons'
export default function LeftBar() {
  return (
    <div className="leftbar">
        <div className="left-container">
            <div className="menu">
                <Link to='/'>
                    <FontAwesomeIcon icon={faHome} />
                    <h4>Home</h4>
                </Link>
                <Link to='/'>
                    <FontAwesomeIcon icon={faBell} />
                    <h4>Notifications</h4>
                </Link>
                <Link>
                </Link>
            </div>
        </div>
    </div>
  )
}
