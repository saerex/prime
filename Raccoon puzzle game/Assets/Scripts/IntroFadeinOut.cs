using UnityEngine;
using System.Collections;

public class IntroFadeinOut : MonoBehaviour {

    public GameObject panel;
    public GameObject cameraIntro;
    public GameObject mainCamera;
	void Start () {
        
        StartCoroutine(CountDown());
	}
	
	
	void Update () {
	
	}

    private IEnumerator CountDown()
    {
        yield return new WaitForSeconds(5);
        panel.SetActive(true);
        yield return new WaitForSeconds(2);
        if(Application.loadedLevelName == "Intro")
        {
            
            Application.LoadLevel("MainMenu");
        }
        else
        {
            
            mainCamera.SetActive(true);
            cameraIntro.SetActive(false);
        }
        
    }
}
