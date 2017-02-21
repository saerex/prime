using UnityEngine;
using System.Collections;
using System;
//script attached to gameObject Play_Button and animate button only 1 time
public class StopAnimateButton : MonoBehaviour {


    private void Update()
    {
        if (gameObject.GetComponent<RectTransform>().localScale.x > 1.97 || gameObject.GetComponent<RectTransform>().localScale.y > 1.97)
        {

            gameObject.GetComponent<Animator>().Stop();
        }
    }


}
