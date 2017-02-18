using UnityEngine;
using System.Collections;

public class FollowTarget: MonoBehaviour
{
		public Transform[] target;//tragets
		public float tragetDistanceOffset = 0.1f;//target offset
		public bool reachedTarget;//reached target flag
		public bool isRunning = true;//is running flag
		public bool stopFollowAfterReachTarget;//stop follow flag
		public float speed = 10;//follow speed
		public bool followX, followY, followZ;//follow x,y,z flags
		public int tragetIndex = 0;//target index
		private float xpos, ypos, zpos;//x,y,z positions
		private float smoothDampVelocity = 0;//smooth damp velocity
		public FollowMethod followMethod = FollowMethod.LERP;//follow method

		void Start ()
		{
				if (target == null) {
                        target = new Transform[1];
				}
		}

		
		void Update ()
		{
				if (!isRunning || target[tragetIndex] == null) {
						return;
				}

				if (reachedTarget) {
						if (stopFollowAfterReachTarget) {
								return;
						}
				}

				if (followX) {
						xpos = GetValue (transform.position.x, target[tragetIndex].position.x);//set x position
				} else {
						xpos = transform.position.x;//set x position
				}

				if (followY) {
						ypos = GetValue (transform.position.y, target[tragetIndex].position.y);//set y position
				} else {
						ypos = transform.position.y;//set y position
				}

				if (followZ) {
						zpos = GetValue (transform.position.z, target[tragetIndex].position.z);//set z position
				} else {
						zpos = transform.position.z;//set z position
				}

				transform.position = new Vector3 (xpos, ypos, zpos);//set the position
		
				if (Mathf.Abs (Vector3.Distance (target[tragetIndex].position, transform.position)) <= tragetDistanceOffset) {//when the gameobject reached the target
						this.reachedTarget = true;
				}
		}

		public enum FollowMethod
		{
				LERP,
				SMOOTH_DAMP,
				SMOOTH_STEP,
				MOVE_TOWARD
		};

		//Get the follow postion value
		private float GetValue (float currentValue, float targetValue)
		{
				float returnValue = 0;
				if (followMethod == FollowMethod.LERP) {
						returnValue = Mathf.Lerp (currentValue, targetValue, speed * Time.deltaTime);
				} else if (followMethod == FollowMethod.MOVE_TOWARD) {
						returnValue = Mathf.MoveTowards (currentValue, targetValue, speed * Time.smoothDeltaTime);
				} else if (followMethod == FollowMethod.SMOOTH_DAMP) {
						returnValue = Mathf.SmoothDamp (currentValue, targetValue, ref smoothDampVelocity, speed);
				} else if (followMethod == FollowMethod.SMOOTH_STEP) {
						returnValue = Mathf.SmoothStep (currentValue, targetValue, speed * Time.smoothDeltaTime);
				}
				return returnValue;
		}
}